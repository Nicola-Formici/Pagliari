<?php
//
require_once __DIR__ . '/lib.php';
//
class ItemsEditor extends BaseEditor {
    public $limit = 50;

    public static function init_fields() {
        // $fields = parent::{__FUNCTION__}();
        //
        $fields = [];
        $fields = [
            'codice' => [
                'type' => 'text',
                'show_in_list' => true,
                'show_in_form' =>  false,
                'search_for' => true,
            ],
            'id_marca' => [
                'type' => 'enum_rs',
                'values'  => DB::queryc('select * from cat_marche_articoli', []),
                'index_k' =>'nome',
                'index_v' =>'id',
                'new_url'  => 'marche.php?action=new',
                // 'search_for' => true, // non funziona paginazione su questo tipo di ricerca
            ],
            'nome' => [
                'type' => 'text',
                'search_for' => true,
            ],
            'descrizione' => [
                'type' => 'text',
                'show_in_list' => false,
            ],
            'note' => [
                'type' => 'text',
                'show_in_list' => false,
            ],
            'dati_extra' => [
                'type' => 'text',
                'show_in_list' => false,
            ],
            'dimensione' => [
                'type' => 'text',
                'show_in_list' => false,
            ],
            'num_pezzi' => [
                'type' => 'int',
                'show_in_list' => false,
            ],
            'omologazione' => [
                'show_in_list' => false,
            ],
            // $fields['news'        ] = [ ],
            'binner' => [
                'type' => 'int',
                'show_in_list' => false,
            ],
            'bmaster' => [
                'type' => 'int',
                'show_in_list' => false,
            ],
            'ean' => [
                'type' => 'int',
                'show_in_list' => false,
            ],
            'peso' => [
                'type' => 'int',
                'show_in_list' => false,
            ],
            'confezione' => [
                'type' => 'text',
                'show_in_list' => false,
            ],
            'lunghezza' => [
                'type' => 'int',
                'show_in_list' => false,
            ],
            'larghezza' => [
                'type' => 'int',
                'show_in_list' => false,
            ],
            'altezza' => [
                'type' => 'int',
                'show_in_list' => false,
            ],
            'volume_imb' => [
                'type' => 'int',
                'show_in_list' => false,
            ],
            'peso_imb' => [
                'type' => 'int',
                'show_in_list' => false,
            ],
            'imgs' => [
                'type' => 'text',
                'show_in_list' => false,
            ],
        ];
        //
        // ritorn un ordine preciso da usare per la visualizzazione
        return $fields;
    }
    public static function __init_fields() {
        $fields['ID']['type'] = 'int';
        $fields['PARENT_ID']['type'] = 'int';
        $fields['LEVEL']['type'] = 'int';
        $fields['TITLE']['type'] = 'text';
        $fields['TITLE']['td_max_len'] = 80;
        $fields['TITLE']['show_in_form'] = true;
        $fields['URL']['type'] = 'text';
        $fields['DATE']['type'] = 'date';
        $fields['ORE']['type'] = 'ore';
        $fields['ORE']['td_max_len'] = 5;
        $fields['ORE']['default'] = date('H:i');
        $fields['ORE']['show_in_list'] = 'true';
        $fields['ORE']['show_in_form'] = 'true';
        $fields['URL']['type'] = 'file';
        $fields['URL']['show_in_form'] = 'true';
        $fields['ORIG']['type'] = 'text';
        /*
        $fields['menu_id']['default']=1;
        $fields['menu_id']['type']='enum_rs';
        $fields['menu_id']['values'] = DB::qry("select * from menu", __LINE__, __FILE__);
        $fields['menu_id']['index_k'] = 'titolo_it';
        $fields['menu_id']['index_v'] = 'menu_id';
        $fields['menu_id']['first_empty'] = true;
        $fields['menu_id']['callback'] = null;
        $fields['in_evidenza']['default']='0';
        $fields['in_evidenza']['type']='bool';
        $fields['in_evidenza']['help']='gli eventi in evidenza appaiono in homepage';
        $fields['data_inizio']['default']=date('Y-m-d');
        $fields['data_inizio']['type']='date';
        $fields['data_fine']['default']=date('Y-m-d');
        $fields['data_fine']['type']='date';
        $fields['link_esterno']['type']='text';
        $fields['link_esterno']['show_in_list']=false;
        $fields['link_esterno']['help']='specifica un indirizzo esterno da aprire al posto di una scheda nella sezione eventi';
        $fields['immagine']['type']='file';
        $fields['immagine']['show_in_list']=true;
        $fields['immagine']['help']='immagine locandina, visibile in homepage nel "prossimo evento" e nel "evento in evidenza" ';
        $fields['file_locandina']['type']='file';
        $fields['file_locandina']['show_in_list']=false;
        $fields['file_locandina']['help']='file locandina, se presente può essere scaricato';
        $fields['file_regolamento']['type']='file';
        $fields['file_regolamento']['show_in_list']=false;
        $fields['file_classifica']['type']='file';
        $fields['file_classifica']['show_in_list']=false;
        $fields['gallery']['type']='gallery';
        $fields['gallery']['show_in_list']=false;
        $fields['gallery']['help']='la prima immagine va in home page, nello slideshow degli eventi, se non viene indicata una immagine specifica nel campo "immagine gallery"';
         */
        /*
        if( isset($_GET['action']) && in_array($_GET['action'],  [ 'edit', 'save'] ) ) {
        $evento_id = $_GET['evento_id'];
        $event = EventiList::get_by_id( $evento_id );
        $gallery = $event['gallery'];
        if( count($gallery) > 1 ) {
        $fields['gallery_selected']['type'] = 'enum';
        $fields['gallery_selected']['label'] = 'immagine gallery';
        $fields['gallery_selected']['show_in_list'] = false;
        $fields['gallery_selected']['help'] = "seleziona l'immagine da mostrare in home page, nello slideshow degli eventi";
        $fields['gallery_selected']['values'] = array_merge ([0=>'default'] , range(1, count($gallery) ) );
        }
        }
         */
        /*
        $fields['TITLE']['search_for'] = true;

        $fields['PARENT_TITLE']['type'] = 'text';
        $fields['PARENT_TITLE']['show_in_list'] = true;
        $fields['PARENT_TITLE']['show_in_form'] = false;
        $fields['PARENT_TITLE']['td_max_len'] = 80;

        $fields['ORE']['show_in_form'] = true;
         */
        /*
        $sql_select_subcategories = "select ID,
        concat(
        (select D1.title from documents as D1 where D1.ID=D2.PARENT_ID),
        ' > ',
        D2.title
        ) as TITLE
        from documents as D2  where level=2
        order by TITLE
        ";
        $fields['PARENT_ID']['show_in_list'] = false; //mostra parent title
        $fields['PARENT_ID']['show_in_form'] = true; // select categora>subcategoria
        $fields['PARENT_ID']['default'] = null;
        $fields['PARENT_ID']['type'] = 'enum_rs';
        $fields['PARENT_ID']['values'] = DB::qry($sql_select_subcategories, []);
        $fields['PARENT_ID']['index_v'] = 'ID';
        $fields['PARENT_ID']['index_k'] = 'TITLE';
        $fields['PARENT_ID']['first_empty'] = true;
        $fields['PARENT_ID']['callback'] = null;
        $fields['PARENT_ID']['new_url'] = 'sub_categs.php?action=new';
         */
        $fields['LEVEL']['default'] = 1;
        $fields['DATE']['default'] = date('Y-m-d');
        switch (1) {
        case 1:
            $fields_hide = ['ID', 'ORIG', 'PARENT_ID', 'LEVEL', 'DATE', 'ORE', 'URL'];
            break;
        case 2:
            $fields_hide = ['ID', 'ORIG', 'LEVEL', 'ORE', 'URL'];
            break;
        case 3:
            $fields_hide = ['ID', 'ORIG', 'LEVEL'];
            break;
        }
        // hide completley those fields
        foreach ($fields_hide as $f) {
            $fields[$f]['show_in_list'] = false;
            $fields[$f]['show_in_form'] = false;
        }
        // parent id select
        $fields['PARENT_ID']['default'] = 1;
        $fields['PARENT_ID']['type'] = 'enum_rs';
        $fields['PARENT_ID']['values'] = []; //DB::qry("select * from documents where LEVEL=" . (static::$level - 1), []);
        $fields['PARENT_ID']['index_v'] = 'ID';
        $fields['PARENT_ID']['index_k'] = 'TITLE';
        $fields['PARENT_ID']['first_empty'] = true;
        $fields['PARENT_ID']['callback'] = null;
        $fields['PARENT_ID']['new_url'] = 'categorie.php?action=new';
        return $fields;
    }

}

$fields = ItemsEditor::init_fields();
$editor = new ItemsEditor([
    'table_name' => 'cat_articoli',
    'pkey' => 'codice',
    'labels' => [
        'cat_articoli' => 'Articoli',

    ],
], $fields);

$view = new AdminLayout();
$view->editor = $editor;
echo $view->render();