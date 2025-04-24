<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="./style.css">
    <title>Currency Convertor</title>
</head>
<body>
    <div class="content-card-lite content-cards__card card-main">
    </div>
</body>
    <!-- 
        Reference 
            https://github.com/fawazahmed0/exchange-api?tab=readme-ov-file
            https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/gbp.json
    -->
        <label for="selectFromCountry">From Country</label>
        <div class="custom-select">
            <select name="selectFromCountry" id="selectFromCountry">
                <option value="gbp" selected>British Pound</option>
                <option value="sgd">Singapore Dollar</option>
                <option value="usd">US Dollar</option>
                <option value="mmk">Myanmar Kyat</option>
                <option value="thb">Thailand Bhat</option>
            </select>
        </div>
        <div class="form__group field">
            <input type="number"  name="txtFromCountry" id="txtFromCountry" class="form__field" placeholder="1000"  required />
            <label for="txtFromCountry" class="form__label" id="lblFromCountry"></label>
        </div>
        <br><br>
        <label for="selectToCountry">To Country</label>
        <div class="custom-select">
            <select name="selectToCountry" id="selectToCountry">
                <option value="gbp">British Pound</option>
                <option value="sgd">Singapore Dollar</option>
                <option value="usd">US Dollar</option>
                <option value="mmk" selected>Myanmar Kyat</option>
                <option value="thb">Thailand Bhat</option>
            </select>
        </div>
        <div class="form__group field">
            <input type="number"  name="txtToCountry" id="txtToCountry" class="form__field" placeholder="1000"  required />
            <label for="txtToCountry" class="form__label" id="lblToCountry"></label>
        </div>
        <input type="submit" id ="butConvert" value="Convert">

    <script>
        $("#butConvert").click(function(e){
            e.preventDefault();
            $.ajax({
                type: 'GET',
                dataType : 'json',
                url : 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/'+$("#selectFromCountry").val()+'.json',
                success: function(data,status,xhr){
                    var result = (($("#txtFromCountry").val()) * (data[$("#selectFromCountry").val()][$("#selectToCountry").val()])).toFixed(2).replace(/\.0+$/, '');
                    $("#txtToCountry").val(result)
                }
            })
        })
        $(document).ready(function(){
            $("#lblFromCountry").html($("#selectFromCountry").find(":selected").text());
            $("#lblToCountry").html($("#selectToCountry").find(":selected").text());
        });
        $(document).on("change","#selectFromCountry",function(){
            $("#lblFromCountry").html($("#selectFromCountry").find(":selected").text());
        });
        $(document).on("change","#selectToCountry",function(){
            $("#lblToCountry").html($("#selectToCountry").find(":selected").text());
        });
    </script>
</html>