
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<form method="get" action="">
    <div class="form-group">
        <label for="my-select">Text</label>
        <select id="my-select" class="form-control" name="">
            <option>Text</option>
        </select>
    </div>

    <button id="show" type="button"> Show </button>
</form>

<script>
    jQuery( document ).ready( function(){
        jQuery('#show').click( function(){
            let lat     = '16.802374';
            let long    = '107.1092616';
            let API     = 'ba29e6d3e631b5184d1b86e3fc2b2212';

            // let api_url = `https://api.openweathermap.org/data/3.0/onecall?lat=${lat}&lon=${long}&appid=${API}`;
            let api_url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${long}&appid=${API}`;

            jQuery.ajax({
                url : api_url,
                type: 'GET',
                dataType: 'json',
                success: function(res){
                    alert(res.weather[0].description);


                }
            });
        });
    });
</script>