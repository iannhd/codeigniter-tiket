<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/css/bootstrap.bundle.min.js')?>"></script>

<script>
    $("#bagian_a").hide();
    $("#bagian_b").hide();
    function cekGerbong(){
        var gambar = $('#img_gerbong')
        var gerbong = $('#select_gerbong')
        
        if(gerbong.val() === "1"){
            gambar.attr('src', '<?= base_url('assets/gerbong/gerbong1.png') ?>');
        } 
        else if(gerbong.val() === "2"){
            gambar.attr('src', '<?= base_url('assets/gerbong/gerbong2.png') ?>');  
        } 
        else if(gerbong.val() === "3"){
            gambar.attr('src', '<?= base_url('assets/gerbong/gerbong3.png') ?>'); 
        }
    }

    function cekBagian(){

        var bagian = $('#bagian');
        var bagian_a = $('#bagian_a')
        var bagian_b = $('#bagian_b')

        if(bagian.val() === "a"){
            $('#bagian_a').show()
            $("#bagian_b").hide();
        } else if (bagian.val("b")){
            $('#bagian_b').show()
            $("#bagian_a").hide();
        }

    }

</script>
</body>
</html>