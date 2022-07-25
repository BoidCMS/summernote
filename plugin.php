<?php defined( 'App' ) or die( 'BoidCMS' );
/**
 *
 * Summernote - wysiwyg editor
 *
 * @package BoidCMS
 * @subpackage Summernote
 * @author Shoaiyb Sysa
 * @licence GPLV3
 * @version 1.0
 */

global $App;
$App->set_action( 'admin_head', 'sn_scripts' );
$App->set_action( 'admin_end', 'sn_init' );

/**
 * Summernote initializer
 * @return ?string
 */
function sn_init(): ?string {
  global $App, $page;
  $pages = sn_embed_pages();
  if ( in_array( $page, $pages ) ) {
    return '
    <script type="text/javascript">
      $(document).ready(function() {
        $("' . $App->_( '#content', 'sn_id' ) . '").summernote({
          ' . $App->_( 'inheritPlaceholder: true,', 'sn_toolbar' ) . '
        });
      });
    </script>';
  }
  return null;
}

/**
 * Summernote styles, and scripts
 * @return ?string
 */
function sn_scripts(): ?string {
  global $App, $page;
  $pages = sn_embed_pages();
  if ( in_array( $page, $pages ) ) {
    return '
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js" integrity="sha256-5slxYrL5Ct3mhMAp/dgnb5JSnTYMtkr4dHby34N10qw=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" integrity="sha256-IKhQVXDfwbVELwiR0ke6dX+pJt0RSmWky3WB2pNx9Hg=" crossorigin="anonymous">
    <style type="text/css">@media(max-width:600px){.note-editor{width:100%!important}}.note-editor{width:60%;margin:auto}.note-editor{text-align:left}.note-editor.note-frame.fullscreen{background:white;height:100%}</style>';
  }
  return null;
}

/**
 * Summernote embeddable pages
 * @return array
 */
function sn_embed_pages(): array {
  global $App;
  $option = $App->_l( 'editable_pages' );
  $pages =   array( 'create', 'update' );
  return  array_merge( $option, $pages );
}
?>
