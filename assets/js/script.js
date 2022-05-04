jQuery(Document).ready(function() {

    // event ketika key ditulis
    jQuery('#keyword').on('keyup', function() {
        jQuery('#container').load('ajax/mahasiswa.php?keyword=' + jQuery('#keyword').val())
    });
});