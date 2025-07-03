<script>

    function  getFileBlob( selector){
                var fileInput = $(String(selector))[0];
                var file = fileInput.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    console.log('File as Data URL:', e.target.result);
                     return e.target.result;
                };
                reader.readAsDataURL(file); 
    }
</script>