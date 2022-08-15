<?php
/*
   * Classe Rota
   * Cria as URL, carrega os controladores, métodos e parametros
   * FORMATO URL - /controlador/metodo/parametros
*/

class Rota
{
    //atributos da classe
    /*
    Escopo de Atributo Public
    Isso significa que ele pode ser acessado e alterado do lado de fora por qualquer pessoa ou entidade
    Escopo de Atributo Private
    Esse só pode ser acessado de dentro da clase. Para este utiliza-se getters e setters
    Escopo de Atributo Protected
    atributos do tipo protected estão disponíveis para serem acessados e modificados por classes herdadas, o que é uma características não existente no modo private.
    */
    private $controlador = 'Paginas';
    private $metodo = 'index';
    private $parametros = [];

    public function __construct()
    {
        //se a url existir joga a funcao url na variavel $url
        $url = $this->url() ? $this->url() : [0];
        //checa se o controlador existe
        //ucwords — Converte para maiúsculas o primeiro caractere de cada palavra
        if (file_exists('../app/Controllers/' . ucwords($url[0]) . '.php')) : //verificando se o controlador existe dentro de app/Controllers
            //se existir seta como controlador
            $this->controlador = ucwords($url[0]);
            //unset — Destrói a variável especificada
            unset($url[0]);
        endif;

        //requere o controlador
        require_once '../app/Controllers/' . $this->controlador . '.php';
        //instancia o controlador
        $this->controlador = new $this->controlador; //Controlador agora passa a ser um objeto do tipo do controlador informado

        //checa se o método existe, segunda parte da url
        if (isset($url[1])) :
            //method_exists — Checa se o método da classe existe
            if (method_exists($this->controlador, $url[1])) :
                $this->metodo = $url[1]; //se o metodo existir então metodo recebe o nome do metodo passado na url 
                unset($url[1]);
            endif;
        endif;

        //array_values — Retorna todos os valores de um array (o valor referente ao controlador e ao método já foram removidos com o unset, então pegaremos todos valores do array)
        $this->parametros = $url ? array_values($url) : []; //Se existir retorna um array com os valores se não retorna um array vazio

        //call_user_func_array — Chama uma dada função de usuário com um array de parâmetros
        call_user_func_array([$this->controlador, $this->metodo], $this->parametros);
    }

    // retorna a url em um array
    private function url()
    {
        //o filtro FILTER_SANITIZE_URL remove todos os caracteres ilegais de uma URL, porém já é uma função depreceada
        //$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL); //só pega a url informada graças a configuração do .htaccess que está dentro da pasta public
        //Visto que a função acima caiu em desuso, então utilizaremos a função strip_tags do php para limpar a url e transforma-la em string
        $url = strip_tags(filter_input(INPUT_GET, 'url'));
        //verifica se a url existe
        if (isset($url)) :
            //trim — Retira espaço no ínicio e final de uma string
            //rtrim — Retira espaço em branco (ou outros caracteres) do final da string
            $url = trim(rtrim($url, '/'));
            //explode — Divide uma string em strings, retorna um array. Onde o índice 0 será o controlador, indice 1 será o método e indice 2 ou mais serão os parâmetros 
            $url = explode('/', $url);
            return $url; //retorna a url em formato de um array.
        endif;
    }
}
