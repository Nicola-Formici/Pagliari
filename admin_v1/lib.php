<?php
require_once __DIR__ . '/../lib/BE/init.php';
require_once __DIR__ . '/../lib/BE/vendor/tableeditor/TRateLimit.php';
// @see IR_ENV::is_DEV IR_ENV::is_PROD()
class P_Auth extends Auth {
    public static function build_css() {
        $css_path = DIR_ROOT . '/lib/BE/vendor/tableeditor/DBTableEditor.css';
        $css = file_get_contents($css_path);
        return $html = <<<__END__
        <link rel="stylesheet" href="">
        <style>
        body {
            background: transparent url(../img/footer_g.jpg) no-repeat center bottom;
            min-height: 600px;
        }
        $css
        </style>
__END__;
    }
}
// main pawd protect
// IP da cui si connette di solito emanuela:31.44.163.188
P_Auth::password_protect($allowed_credential = UserList::$a_admin);
$username = session_get('auth_username');
if (!in_array($username, array_keys($allowed_credential))) {
    die(sprintf('restricted username %s ', $username));
}
//----------------------------------------------------------------------------
//
//----------------------------------------------------------------------------
class AdminView extends BaseAdminView {}
//
class AdminLayout extends AdminView {
    public $menu_dict = [
        'Home' => ['url' => 'index.php', 'icon' => 'home'],
        AdminView::DIVIDER,
        'Articoli' => ['url' => 'items.php', 'icon' => 'th-large'],
        AdminView::DIVIDER,
        'XXX' => ['url' => 'xxxxxx.php', 'icon' => 'th-large'],
        AdminView::DIVIDER,
        'Utenti E-Commerce' => ['url' => 'users.php', 'icon' => 'user'],
    ];
    public static function layout($editor, $menu_dict) {
        $popup = Request::GET_int('popup', 0);
        list($editor_html, $editor_css, $editor_js) = self::render_editor($editor);
        //
        $feedback = new FeedbackPresenter();
        $html_flash = $feedback->render();
        // menu
        $html_menu_container = self::render_menu($menu_dict);
        //
        $css_layout = self::render_css();
        $_if = function ($is_conition, $html_ok, $html_ko = '') {return $is_conition ? $html_ok : $html_ko;};
        return $html = <<<__END__
        <!doctype html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta charset="utf-8">
            <title>Admin Panel</title>
            $css_layout
            $editor_css
            $editor_js
            <!--[if lt IE 9]>
            <script src="/js/html5shiv.js"></script>
            <![endif]-->
        </head>
        <body class="">
            <div class="container-fluid">
                <div class="row">
                        {$_if(!$popup,$html_menu_container)}
                        <div class="col-sm-9 col-md-10">
                            <br> <br>
                            $html_flash
                            $editor_html
                        </div>
                </div>
            </div>
        </html>
__END__;
    }
    //
    //
    public static function render_menu($menu_dict) {
        $html_admin_menu = self::build_admin_menu_from_dict($menu_dict);
        $icon_exit = icon('off');
        $html_menu_container = <<<__END__
            <div class="col-sm-3 col-md-2 " >
              <ul class="nav nav-sidebar" id="sidebar"  >
                <li class="nav-header">
                    Sezioni
                </li>
                $html_admin_menu
                <li class="nav-header">
                    Sessione
                </li>
                <li><a href="?action=exit" class=" ">$icon_exit esci</a></li>
              </ul>
            </div>
            <style type="text/css">
                @media (min-width: 768px){
                #sidebar {
                    background-color: #f5f5f5;
                    border-right: 1px solid #eee;
                    margin-top: 15%;
                    padding:10px;
                }
            }
            .nav.nav-sidebar .active a {
                background-color: #1886e4;
                color: #fff;
                font-weight: bold;
            }
            .nav-header {
                font-weight: bold;
            }
            </style>
__END__;
        return $html_menu_container;
    }
    // css dell'admin
    protected static function render_css() {
        $css_path = DIR_ROOT . '/lib/BE/vendor/tableeditor/DBTableEditor.css';
        $css_editor = file_get_contents($css_path);
        $css = '
        <!--
        https://getbootstrap.com/docs/3.3/components/#glyphicons
        -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <style type="text/css">
        ' . $css_editor . '
        </style>
        ';
        return $css;
    }
    //
    public static function render_editor($editor) {
        // if we get an editor object, render
        try {
            if (is_object($editor) && method_exists($editor, 'render')) {
                $editor_css = method_exists($editor, 'build_css') ? $editor->build_css() : '';
                $editor_js = method_exists($editor, 'build_js') ? $editor->build_js() : '';
                $editor_html = $editor->render();
            } elseif (is_string($editor) || method_exists($editor, '__toString')) {
                $editor_html = '' . $editor->__tostring();
                $editor_css = DBTableEditor::build_css();
                $editor_js = DBTableEditor::build_js();
            } else {
                $editor_html = '$editor is not renderable';
                $editor_css = $editor_js = '';
            }
        } catch (\Exception $e) { // Throwable $e in php7
            $fmt = 'Render EDITOR Exception: <b>%s</b><br>
            file:%s line:%s <br>
            trace:<pre>%s</pre>';
            $msg = sprintf($fmt,
                $e->getMessage(),
                $e->getFile(), $e->getLine(),
                $e->getTraceAsString() // @see fmt_exception_trace_
            );
            die($msg);
        }
        return [
            $editor_html,
            $editor_css,
            $editor_js,
        ];
    }
}
//----------------------------------------------------------------------------
//
//----------------------------------------------------------------------------
class BaseEditor extends DBTableEditor {
}
