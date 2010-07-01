<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Translate
 * @subpackage Ressource
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id:$
 */

/**
 * EN-Revision: 20377
 */
return array(
    // Zend_Validate_Alnum
    "Invalid type given, value should be float, string, or integer" => "Tipo especificado invÃ¡lido, o valor deve ser float, string, ou inteiro",
    "'%value%' contains characters which are non alphabetic and no digits" => "'%value%' contÃ©m caracteres que nÃ£o sÃ£o alfabÃ©ticos e nem dÃ­gitos",
    "'%value%' is an empty string" => "'%value%' Ã© uma string vazia",

    // Zend_Validate_Alpha
    "Invalid type given, value should be a string" => "Tipo especificado invÃ¡lido, o valor deve ser uma string",
    "'%value%' contains non alphabetic characters" => "'%value%' contÃ©m caracteres nÃ£o alfabÃ©ticos",
    "'%value%' is an empty string" => "'%value%' Ã© uma string vazia",

    // Zend_Validate_Barcode
    "'%value%' failed checksum validation" => "'%value%' falhou na validaÃ§Ã£o do checksum",
    "'%value%' contains invalid characters" => "'%value%' contÃ©m caracteres invÃ¡lidos",
    "'%value%' should have a length of %length% characters" => "'%value%' tem um comprimento de %length% caracteres",
    "Invalid type given, value should be string" => "Tipo especificado invÃ¡lido, o valor deve ser string",

    // Zend_Validate_Between
    "'%value%' is not between '%min%' and '%max%', inclusively" => "'%value%' nÃ£o estÃ¡ entre '%min%' e '%max%', inclusivamente",
    "'%value%' is not strictly between '%min%' and '%max%'" => "'%value%' nÃ£o estÃ¡ exatamente entre '%min%' e '%max%'",

    // Zend_Validate_Callback
    "'%value%' is not valid" => "'%value%' nÃ£o Ã© vÃ¡lido",
    "Failure within the callback, exception returned" => "Falha na chamada de retorno, exceÃ§Ã£o retornada",

    // Zend_Validate_Ccnum
    "'%value%' must contain between 13 and 19 digits" => "'%value%' deve conter entre 13 e 19 dÃ­gitos",
    "Luhn algorithm (mod-10 checksum) failed on '%value%'" => "O algoritmo de Luhn (checksum de mÃ³dulo 10) falhou em '%value%'",

    // Zend_Validate_CreditCard
    "Luhn algorithm (mod-10 checksum) failed on '%value%'" => "O algoritmo de Luhn (checksum de mÃ³dulo 10) falhou em '%value%'",
    "'%value%' must contain only digits" => "'%value%' deve conter apenas dÃ­gitos",
    "Invalid type given, value should be a string" => "Tipo especificado invÃ¡lido, o valor deve ser uma string",
    "'%value%' contains an invalid amount of digits" => "'%value%' contÃ©m uma quantidade invÃ¡lida de dÃ­gitos",
    "'%value%' is not from an allowed institute" => "'%value%' nÃ£o vem de uma instituiÃ§Ã£o autorizada",
    "Validation of '%value%' has been failed by the service" => "A validaÃ§Ã£o de '%value%' falhou por causa do serviÃ§o",
    "The service returned a failure while validating '%value%'" => "O serviÃ§o devolveu um erro enquanto validava '%value%'",

    // Zend_Validate_Date
    "Invalid type given, value should be string, integer, array or Zend_Date" => "Tipo especificado invÃ¡lido, o valor deve ser string, inteiro, matriz ou Zend_Date",
    "'%value%' does not appear to be a valid date" => "'%value%' nÃ£o parece ser uma data vÃ¡lida",
    "'%value%' does not fit the date format '%format%'" => "'%value%' nÃ£o se encaixa no formato de data '%format%'",

    // Zend_Validate_Db_Abstract
    "No record matching %value% was found" => "NÃ£o foram encontrados registros para %value%",
    "A record matching %value% was found" => "Um registro foi encontrado para %value%",

    // Zend_Validate_Digits
    "Invalid type given, value should be string, integer or float" => "Tipo especificado invÃ¡lido, o valor deve ser string, inteiro ou float",
    "'%value%' contains not only digit characters" => "'%value%' nÃ£o contÃ©m apenas nÃºmeros",
    "'%value%' is an empty string" => "'%value%' Ã© uma string vazia",

    // Zend_Validate_EmailAddress
    "Invalid type given, value should be a string" => "Tipo especificado invÃ¡lido, o valor deve ser uma string",
    "'%value%' is no valid email address in the basic format local-part@hostname" => "'%value%' nÃ£o Ã© um endereÃ§o de e-mail vÃ¡lido no formato local-part@hostname",
    "'%hostname%' is no valid hostname for email address '%value%'" => "'%hostname%' nÃ£o Ã© um nome de host vÃ¡lido para o endereÃ§o de e-mail '%value%'",
    "'%hostname%' does not appear to have a valid MX record for the email address '%value%'" => "'%hostname%' nÃ£o parece ter um registro MX vÃ¡lido para o endereÃ§o de e-mail '%value%'",
    "'%hostname%' is not in a routable network segment. The email address '%value%' should not be resolved from public network." => "'%hostname%' nÃ£o Ã© um segmento de rede roteÃ¡vel. O endereÃ§o de e-mail '%value%' nÃ£o deve ser resolvido a partir de um rede pÃºblica.",
    "'%localPart%' can not be matched against dot-atom format" => "'%localPart%' nÃ£o corresponde com o formato dot-atom",
    "'%localPart%' can not be matched against quoted-string format" => "'%localPart%' nÃ£o corresponde com o formato quoted-string",
    "'%localPart%' is no valid local part for email address '%value%'" => "'%localPart%' nÃ£o Ã© uma parte local vÃ¡lida para o endereÃ§o de e-mail '%value%'",
    "'%value%' exceeds the allowed length" => "'%value%' excede o comprimento permitido",

    // Zend_Validate_File_Count
    "Too many files, maximum '%max%' are allowed but '%count%' are given" => "HÃ¡ muitos arquivos, sÃ£o permitidos no mÃ¡ximo '%max%', mas '%count%' foram fornecidos",
    "Too few files, minimum '%min%' are expected but '%count%' are given" => "HÃ¡ poucos arquivos, sÃ£o esperados no mÃ­nimo '%min%', mas '%count%' foram fornecidos",

    // Zend_Validate_File_Crc32
    "File '%value%' does not match the given crc32 hashes" => "O arquivo '%value%' nÃ£o corresponde ao hash crc32 fornecido",
    "A crc32 hash could not be evaluated for the given file" => "NÃ£o foi possÃ­vel avaliar um hash crc32 para o arquivo fornecido",
    "File '%value%' could not be found" => "O arquivo '%value%' nÃ£o pÃ´de ser encontrado",

    // Zend_Validate_File_ExcludeExtension
    "File '%value%' has a false extension" => "O arquivo '%value%' possui a extensÃ£o incorreta",
    "File '%value%' could not be found" => "O arquivo '%value%' nÃ£o pÃ´de ser encontrado",

    // Zend_Validate_File_ExcludeMimeType
    "File '%value%' has a false mimetype of '%type%'" => "O arquivo '%value%' tem o mimetype incorreto: '%type%'",
    "The mimetype of file '%value%' could not be detected" => "O mimetype do arquivo '%value%' nÃ£o pÃ´de ser detectado",
    "File '%value%' can not be read" => "O arquivo '%value%' nÃ£o pÃ´de ser lido",

    // Zend_Validate_File_Exists
    "File '%value%' does not exist" => "O arquivo '%value%' nÃ£o existe",

    // Zend_Validate_File_Extension
    "File '%value%' has a false extension" => "O arquivo '%value%' possui a extensÃ£o incorreta",
    "File '%value%' could not be found" => "O arquivo '%value%' nÃ£o pÃ´de ser encontrado",

    // Zend_Validate_File_FilesSize
    "All files in sum should have a maximum size of '%max%' but '%size%' were detected" => "Todos os arquivos devem ter um tamanho mÃ¡ximo de '%max%', mas um tamanho de '%size%' foi detectado",
    "All files in sum should have a minimum size of '%min%' but '%size%' were detected" => "Todos os arquivos devem ter um tamanho mÃ­nimo de '%min%', mas um tamanho de '%size%' foi detectado",
    "One or more files can not be read" => "Um ou mais arquivos nÃ£o puderam ser lidos",

    // Zend_Validate_File_Hash
    "File '%value%' does not match the given hashes" => "O arquivo '%value%' nÃ£o corresponde ao hash fornecido",
    "A hash could not be evaluated for the given file" => "NÃ£o foi possÃ­vel avaliar um hash para o arquivo fornecido",
    "File '%value%' could not be found" => "O arquivo '%value%' nÃ£o pÃ´de ser encontrado",

    // Zend_Validate_File_ImageSize
    "Maximum allowed width for image '%value%' should be '%maxwidth%' but '%width%' detected" => "A largura mÃ¡xima permitida para a imagem '%value%' deve ser '%maxwidth%', mas '%width%' foi detectada",
    "Minimum expected width for image '%value%' should be '%minwidth%' but '%width%' detected" => "A largura mÃ­nima esperada para a imagem '%value%' deve ser '%minwidth%', mas '%width%' foi detectada",
    "Maximum allowed height for image '%value%' should be '%maxheight%' but '%height%' detected" => "A altura mÃ¡xima permitida para a imagem '%value%' deve ser '%maxheight%', mas '%height%' foi detectada",
    "Minimum expected height for image '%value%' should be '%minheight%' but '%height%' detected" => "A altura mÃ­nima esperada para a imagem '%value%' deve ser '%minheight%', mas '%height%' foi detectada",
    "The size of image '%value%' could not be detected" => "O tamanho da imagem '%value%' nÃ£o pÃ´de ser detectado",
    "File '%value%' can not be read" => "O arquivo '%value%' nÃ£o pÃ´de ser lido",

    // Zend_Validate_File_IsCompressed
    "File '%value%' is not compressed, '%type%' detected" => "O arquivo '%value%' nÃ£o estÃ¡ compactado: '%type%' detectado",
    "The mimetype of file '%value%' could not be detected" => "O mimetype do arquivo '%value%' nÃ£o pÃ´de ser detectado",
    "File '%value%' can not be read" => "O arquivo '%value%' nÃ£o pÃ´de ser lido",

    // Zend_Validate_File_IsImage
    "File '%value%' is no image, '%type%' detected" => "O arquivo '%value%' nÃ£o Ã© uma imagem: '%type%' detectado",
    "The mimetype of file '%value%' could not be detected" => "O mimetype do arquivo '%value%' nÃ£o pÃ´de ser detectado",
    "File '%value%' can not be read" => "O arquivo '%value%' nÃ£o pÃ´de ser lido",

    // Zend_Validate_File_Md5
    "File '%value%' does not match the given md5 hashes" => "O arquivo '%value%' nÃ£o corresponde ao hash md5 fornecido",
    "A md5 hash could not be evaluated for the given file" => "NÃ£o foi possÃ­vel avaliar um hash md5 para o arquivo fornecido",
    "File '%value%' could not be found" => "O arquivo '%value%' nÃ£o pÃ´de ser encontrado",

    // Zend_Validate_File_MimeType
    "File '%value%' has a false mimetype of '%type%'" => "O arquivo '%value%' tem o mimetype incorreto: '%type%'",
    "The mimetype of file '%value%' could not be detected" => "O mimetype do arquivo '%value%' nÃ£o pÃ´de ser detectado",
    "File '%value%' can not be read" => "O arquivo '%value%' nÃ£o pÃ´de ser lido",

    // Zend_Validate_File_NotExists
    "File '%value%' exists" => "O arquivo '%value%' existe",

    // Zend_Validate_File_Sha1
    "File '%value%' does not match the given sha1 hashes" => "O arquivo '%value%' nÃ£o corresponde ao hash sha1 fornecido",
    "A sha1 hash could not be evaluated for the given file" => "NÃ£o foi possÃ­vel avaliar um hash sha1 para o arquivo fornecido",
    "File '%value%' could not be found" => "O arquivo '%value%' nÃ£o pÃ´de ser encontrado",

    // Zend_Validate_File_Size
    "Maximum allowed size for file '%value%' is '%max%' but '%size%' detected" => "O tamanho mÃ¡ximo permitido para o arquivo '%value%' Ã© '%max%', mas '%size%' foram detectados",
    "Minimum expected size for file '%value%' is '%min%' but '%size%' detected" => "O tamanho mÃ­nimo esperado para o arquivo '%value%' Ã© '%min%', mas '%size%' foram detectados",
    "File '%value%' could not be found" => "O arquivo '%value%' nÃ£o pÃ´de ser encontrado",

    // Zend_Validate_File_Upload
    "File '%value%' exceeds the defined ini size" => "O arquivo '%value%' excede o tamanho definido na configuraÃ§Ã£o",
    "File '%value%' exceeds the defined form size" => "O arquivo '%value%' excede o tamanho definido do formulÃ¡rio",
    "File '%value%' was only partially uploaded" => "O arquivo '%value%' foi apenas parcialmente enviado",
    "File '%value%' was not uploaded" => "O arquivo '%value%' nÃ£o foi enviado",
    "No temporary directory was found for file '%value%'" => "Nenhum diretÃ³rio temporÃ¡rio foi encontrado para o arquivo '%value%'",
    "File '%value%' can't be written" => "O arquivo '%value%' nÃ£o pÃ´de ser escrito",
    "A PHP extension returned an error while uploading the file '%value%'" => "Uma extensÃ£o do PHP retornou um erro enquanto o arquivo '%value%' era enviado",
    "File '%value%' was illegally uploaded. This could be a possible attack" => "O arquivo '%value%' foi enviado ilegalmente. Este poderia ser um possÃ­vel ataque",
    "File '%value%' was not found" => "O arquivo '%value%' nÃ£o foi encontrado",
    "Unknown error while uploading file '%value%'" => "Erro desconhecido ao enviar o arquivo '%value%'",

    // Zend_Validate_File_WordCount
    "Too much words, maximum '%max%' are allowed but '%count%' were counted" => "HÃ¡ muitas palavras, sÃ£o permitidas no mÃ¡ximo '%max%', mas '%count%' foram contadas",
    "Too less words, minimum '%min%' are expected but '%count%' were counted" => "HÃ¡ poucas palavras, sÃ£o esperadas no mÃ­nimo '%min%', mas '%count%' foram contadas",
    "File '%value%' could not be found" => "O arquivo '%value%' nÃ£o pÃ´de ser encontrado",

    // Zend_Validate_Float
    "Invalid type given, value should be float, string, or integer" => "Tipo especificado invÃ¡lido, o valor deve ser float, string, ou inteiro",
    "'%value%' does not appear to be a float" => "'%value%' nÃ£o parece ser um float",

    // Zend_Validate_GreaterThan
    "'%value%' is not greater than '%min%'" => "'%value%' nÃ£o Ã© maior que '%min%'",

    // Zend_Validate_Hex
    "Invalid type given, value should be a string" => "Tipo especificado invÃ¡lido, o valor deve ser uma string",
    "'%value%' has not only hexadecimal digit characters" => "'%value%' nÃ£o contÃ©m somente caracteres hexadecimais",

    // Zend_Validate_Hostname
    "Invalid type given, value should be a string" => "Tipo especificado invÃ¡lido, o valor deve ser uma string",
    "'%value%' appears to be an IP address, but IP addresses are not allowed" => "'%value%' parece ser um endereÃ§o de IP, mas endereÃ§os de IP nÃ£o sÃ£o permitidos",
    "'%value%' appears to be a DNS hostname but cannot match TLD against known list" => "'%value%' parece ser um hostname de DNS, mas o TLD nÃ£o corresponde a nenhum TLD conhecido",
    "'%value%' appears to be a DNS hostname but contains a dash in an invalid position" => "'%value%' parece ser um hostname de DNS, mas contÃ©m um traÃ§o em uma posiÃ§Ã£o invÃ¡lida",
    "'%value%' appears to be a DNS hostname but cannot match against hostname schema for TLD '%tld%'" => "'%value%' parece ser um hostname de DNS, mas nÃ£o corresponde ao esquema de hostname para o TLD '%tld%'",
    "'%value%' appears to be a DNS hostname but cannot extract TLD part" => "'%value%' parece ser um hostname de DNS, mas o TLD nÃ£o pÃ´de ser extraÃ­do",
    "'%value%' does not match the expected structure for a DNS hostname" => "'%value%' nÃ£o corresponde com a estrutura esperada para um hostname de DNS",
    "'%value%' does not appear to be a valid local network name" => "'%value%' nÃ£o parece ser um nome de rede local vÃ¡lido",
    "'%value%' appears to be a local network name but local network names are not allowed" => "'%value%' parece ser um nome de rede local, mas os nomes de rede local nÃ£o sÃ£o permitidos",
    "'%value%' appears to be a DNS hostname but the given punycode notation cannot be decoded" => "'%value%' parece ser um hostname de DNS, mas a notaÃ§Ã£o punycode fornecida nÃ£o pode ser decodificada",

    // Zend_Validate_Iban
    "Unknown country within the IBAN '%value%'" => "PaÃ­s desconhecido para o IBAN '%value%'",
    "'%value%' has a false IBAN format" => "'%value%' nÃ£o Ã© um formato IBAN vÃ¡lido",
    "'%value%' has failed the IBAN check" => "'%value%' falhou na verificaÃ§Ã£o do IBAN",

    // Zend_Validate_Identical
    "The token '%token%' does not match the given token '%value%'" => "A marca '%token%' nÃ£o corresponde a marca '%value%' fornecida",
    "No token was provided to match against" => "Nenhuma marca foi fornecida para a comparaÃ§Ã£o",

    // Zend_Validate_InArray
    "'%value%' was not found in the haystack" => "'%value%' nÃ£o faz parte dos valores esperados",

    // Zend_Validate_Int
    "Invalid type given, value should be string or integer" => "Tipo especificado invÃ¡lido, o valor deve ser string ou inteiro",
    "'%value%' does not appear to be an integer" => "'%value%' nÃ£o parece ser um nÃºmero inteiro",

    // Zend_Validate_Ip
    "Invalid type given, value should be a string" => "Tipo especificado invÃ¡lido, o valor deve ser uma string",
    "'%value%' does not appear to be a valid IP address" => "'%value%' nÃ£o parece ser um endereÃ§o de IP vÃ¡lido",

    // Zend_Validate_Isbn
    "'%value%' is no valid ISBN number" => "'%value%' nÃ£o Ã© um nÃºmero ISBN vÃ¡lido",

    // Zend_Validate_LessThan
    "'%value%' is not less than '%max%'" => "'%value%' nÃ£o Ã© menor que '%max%'",

    // Zend_Validate_NotEmpty
    "Invalid type given, value should be float, string, array, boolean or integer" => "Tipo especificado invÃ¡lido, o valor deve ser float, string, matriz, booleano ou inteiro",
    "Value is required and can't be empty" => "O valor Ã© obrigatÃ³rio e nÃ£o pode estar vazio",

    // Zend_Validate_PostCode
    "Invalid type given, value should be string or integer" => "Tipo especificado invÃ¡lido, o valor deve ser string ou inteiro",
    "'%value%' does not appear to be an postal code" => "'%value%' nÃ£o parece ser um cÃ³digo postal",

    // Zend_Validate_Regex
    "Invalid type given, value should be string, integer or float" => "Tipo especificado invÃ¡lido, o valor deve ser string, inteiro ou float",
    "'%value%' does not match against pattern '%pattern%'" => "'%value%' nÃ£o corresponde ao padrÃ£o '%pattern%'",

    // Zend_Validate_Sitemap_Changefreq
    "'%value%' is no valid sitemap changefreq" => "'%value%' nÃ£o Ã© um changefreq de sitemap vÃ¡lido",

    // Zend_Validate_Sitemap_Lastmod
    "'%value%' is no valid sitemap lastmod" => "'%value%' nÃ£o Ã© um lastmod de sitemap vÃ¡lido",

    // Zend_Validate_Sitemap_Loc
    "'%value%' is no valid sitemap location" => "'%value%' nÃ£o Ã© uma localizaÃ§Ã£o de sitemap vÃ¡lida",

    // Zend_Validate_Sitemap_Priority
    "'%value%' is no valid sitemap priority" => "'%value%' nÃ£o Ã© uma prioridade de sitemap vÃ¡lida",

    // Zend_Validate_StringLength
    "Invalid type given, value should be a string" => "Tipo especificado invÃ¡lido, o valor deve ser uma string",
    "'%value%' is less than %min% characters long" => "O tamanho de '%value%' Ã© inferior a %min% caracteres",
    "'%value%' is more than %max% characters long" => "O tamanho de '%value%' Ã© superior a %min% caracteres",
);
?>