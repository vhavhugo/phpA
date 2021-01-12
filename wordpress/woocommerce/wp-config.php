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
define( 'DB_NAME', 'alura_woocommerce' );

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
define( 'AUTH_KEY',         ']taD#dX)[S>WPoaHmAiTrEgX7<lb>3-(onyQ$fG,f;:oYlRYPEek:,_>k(M@gX]g' );
define( 'SECURE_AUTH_KEY',  'MMVLB!wz_mUY,]zoi-=A!XH/I8h?.aZB`83ODP(NPenOSj^FY98Q,+&;j^3g!7~L' );
define( 'LOGGED_IN_KEY',    'mf67|K(*Urw4v]-&N-j#T8SYT9VNmaQ_*%b4+}fXY kV8Os{FiG8lUx.H>XH<PG+' );
define( 'NONCE_KEY',        'U7Cj?hY98N,C8}{O!9][`uGj^Y!V:!Frw{l&c~pjRLrLWr,hTB2`K,*NU:O795z}' );
define( 'AUTH_SALT',        '>;&bX2Y2LjB[/e526P-EAJ/ M:20*[6Bo+X7X<~]=.dT]PM->5UtJQ80Df3HEx/7' );
define( 'SECURE_AUTH_SALT', '2ZNy? K- `85&8[Ob?:N z:@%1`JYkZf]Ssa7FR$NBzpU,gOLry[luAkV,-~[]$n' );
define( 'LOGGED_IN_SALT',   '/Qi:qL;vY]hQN8xZ%yQfk^$cQ(<;q[ub[f;n`BmRL3;Ge;$e$#H4V<FlgGDP%_VL' );
define( 'NONCE_SALT',       '%@bh,n<04fF0@jwV`cR9Izxh?q1a]11fa#`RU z3,8}I/Uvya2Z%#k{9EgM? c7E' );

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
