<?php

/**
 * Zyra Languages
 *
 * @package  Languages
 * @author   Kadu Velasco (@kaduvelasco) <kadu.velasco@gmail.com>
 * @url      <https://github.com/kaduvelasco/zyra-languages>
 * @license  The MIT License (MIT) - <http://opensource.org/licenses/MIT>
 */

declare(strict_types=1);

namespace Zyra;

use Exception;

class Languages
{
    /**
     * @var array<mixed>
     */
    private array $lang_content = [];

    /**
     * Construtor da classe.
     */
    public function __construct(string $language_pack = null)
    {
        if (!is_null($language_pack)) {
            $this->loadLanguagePack($language_pack);
        }
    }

    /**
     * Impede o clone da classe.
     */
    private function __clone()
    {
        die('Clone não é permitido.');
    }

    /**
     * Define o pacote de idioma que será utilizado.
     *
     * @param string $language_pack
     * @return void
     */
    public function setLanguagePack(string $language_pack): void
    {
        $this->loadLanguagePack($language_pack);
    }

    /**
     * Retorna o texto solicitado.
     *
     * @param string $string_name
     * @return string
     */
    public function string(string $string_name): string
    {
        try {
            if (!isset($this->lang_content[$string_name])) {
                throw new Exception('String "' . $string_name . '" does not exist in language pack');
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $this->lang_content[$string_name];
    }

    /**
     * Retorna o texto solicitado formatado com uma tag HTML.
     *
     * @param string $string_name
     * @param string|null $html_tag
     * @param string $html_class
     * @param string $html_style
     * @return string
     */
    public function format(
        string $string_name,
        string $html_tag = null,
        string $html_class = '',
        string $html_style = ''
    ): string {
        try {
            $html_allowed = ['div', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'span', 'pre', 'strong', 'em'];

            if (!in_array($html_tag, $html_allowed)) {
                throw new Exception('Tag "' . $html_tag . '" is not supported');
            }

            // Formatando a string
            $text = $this->string($string_name);

            $html = '<' . $html_tag . ' 
                class="' . $html_class . '" 
                style="' . $html_style . '">' . $text . '</' . $html_tag . '>';
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $html;
    }
    /**
     * Carrega o conteúdo do pacote de idiomas e deixa disponível para utilização.
     *
     * @param string $language_pack
     * @return void
     */
    private function loadLanguagePack(string $language_pack): void
    {
        try {
            // Verifica se o arquivo informado existe.
            if (!is_file($language_pack)) {
                throw new Exception('The language pack provided was not found on the server.');
            }

            // Seleciona o conteúdo do arquivo informado.
            $content = file_get_contents($language_pack);

            if (!$content) {
                throw new Exception('Could not load language pack. Cod 001');
            }

            // Converte para array
            $this->lang_content = json_decode($content, true);

            if (JSON_ERROR_NONE !== json_last_error()) {
                throw new Exception('Could not read language pack. Cod 002');
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
