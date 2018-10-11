<?php
require_once __DIR__ . '/lib.php';

//
class IndexController extends AdminController {
    //public function __construct(){}
    function ActionIndex() {

        /*
        $html_t = tmpl('
          <div class="table-responsive">
             <div class="panel panel-primary panel-success _panel-info _panel-warning _panel-danger ">
               <div class="panel-heading">
                 <h3 class="panel-title">
                     Totali
                 </h3>
               </div>
               <div class="panel-body">
                     <table id="table_totals" border="0" cellpadding="0" cellspacing="0" class="table table-condensed">
                         <thead>
                             <tr>
                                 <th> Tipo </th>
                                 <th> Numero Documenti </th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td> Categorie </td>
                                 <td> {{num_categorie}} </td>
                             </tr>
                             <tr>
                                 <td> Sub Categorie </td>
                                 <td> {{num_sub_cat}} </td>
                             </tr>
                             <tr>
                                 <td> Documenti </td>
                                 <td> {{num_documents}} </td>
                             </tr>
                         </tbody>
                     </table>
                     <a href="?action=cc" id=" "
                        class="btn btn-success btn-inverse btn-mini pull-right"
                        -data-toggle="tooltip" data-placement="top"
                        title="Pubblica documenti" >
                        <i class="glyphicon glyphicon-refresh"></i>
                        Pubblica Documenti</a>
               </div>
             </div>
             <div class="panel panel-primary _panel-success _panel-info _panel-warning _panel-danger ">
               <div class="panel-heading">
                 <h3 class="panel-title">
                     Lista documenti
                     <button id="tree_collapse" type="button" class="btn btn-info btn-inverse btn-mini pull-right">open all</button>
                 </h3>
               </div>
               <div class="panel-body">
                 {{html_tree}}
               </div>
             </div>
          </div> ', [
            'num_categorie' => 0,
            'num_sub_cat' => 0,
            'num_documents' => 0,
        ]);
        */
        $html = tmpl('

                {{html_t}}
            <style type="text/css">
            .desc {
                min-height: 50px;
            }
            #tree_collapse {
                padding: 2px 8px;
                margin: -3px;
            }
            #doc_tree > li {
                border-bottom: 1px solid #cfcfcf;
            }
            #doc_tree  li  {
                padding: 3px;
            }
            #doc_tree li li li:hover {
                background-color: #f1f1f1;
            }
            #table_totals {
                font-size: 87%;
            }
            </style>
            ', ['html_t' => $html_t='' ]);
        return $html;
    }


    function ActionCc() {
        apc_clear_cache();
        fcache_clear();
        $this->feedback = new FeedbackPresenter();
        $this->feedback->addFlash('success', 'pubblicazione avvenuta');
        $_redirect = function ($url) {
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $url);
            // $logger->info('reason');
            die('redirect');
        };
        $_redirect($_SERVER["PHP_SELF"] . '?');
    }
    // public function build_css() {echo DBTableEditor::build_css();}
    // public function build_js() {echo DBTableEditor::build_js();}
}
$view = new AdminLayout();
$view->editor = new IndexController();
echo $view->render();
