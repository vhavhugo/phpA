<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'alura_pluguin' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'g1_I/2Se10f*-2;M&v1%Is=gq Nbx/xL;qIHmB[&4Og!3E}EJRN7?v(}}9uyVW]E' );
define( 'SECURE_AUTH_KEY',  'Z=u<NIK(=Y*#uL{#&-} V+!1c<A`L-zz*vC0TIIGXaq.{uw3hw0$ii7{ohhxlShH' );
define( 'LOGGED_IN_KEY',    '9C(*boUe5O(Ai/Rjmr*;Hh#8{A?&4BNA>[V]:CccU_F8lNe@w=aS}7j;@TQyVtjL' );
define( 'NONCE_KEY',        '%k?4.h4m=+EJac%J_s#Z&;<hnr_aX_J})b>1:U~y`N>!pg4@+l/sq+ZIjTK)vOF:' );
define( 'AUTH_SALT',        'PEZP{ N>_Y)q9HKn^7+wxj0r{V5ZaW(82*gEW&=FFm}Xh0:VxR-(y;[g-StHk%P%' );
define( 'SECURE_AUTH_SALT', 'Q/^V1PE+xtsdF[q-JjX2}IYERPQ,OnWgAN[P$F{&*3`2lO_/eY):h2AN^I MOLbR' );
define( 'LOGGED_IN_SALT',   'PiJ&3fw]K0E@5u;l`L^ RZs|weDU(Vbvdd70(cO]mlpyjtX~pY<Czf4VQs{BZ&^Q' );
define( 'NONCE_SALT',       's.{K=x#T&W>@TYVCP9qNE7upi!Ek@MbmHC?U1(ov.sZ#:{-Bb//,nUJ-mc?T|F4s' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
