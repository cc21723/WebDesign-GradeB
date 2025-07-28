<style>
    table{
        width: 60%;
        margin: 10px auto;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #aaa;
    }
    table td{
        background-color: #ccc;
    }
    table td:nth-child(1){
        width: 20%;
        text-align: right;
    }
    table td:nth-child(2) select{
        width: 98%;
    }
</style>
<h3 class="ct">線上訂票</h3>
<table>
    <tr>
        <td>電影：</td>
        <td>
            <select name="movie" id="movie">

            </select>
        </td>
    </tr>
    <tr>
        <td style="background: dimgrey;">日期：</td>
        <td>
            <select name="date" id="date">

            </select>
        </td>
    </tr>
    <tr>
        <td>場次：</td>
        <td>
            <select name="session" id="session">

            </select>
        </td>
    </tr>
</table>
<div class="ct">
    <button>確定</button>
    <button>重置</button>
</div>

<script>
    let url = new URLSearchParams(location.search);
    
    getMovies();

    function getMovies() { 
        let id = 0;
        
        if(url.has('id')){
            id = url.get('id');
        }

        $.get("./api/get_mivie.php",{id},(movies)=>{
            $("#movie").html(movies);
        })
     }
     
</script>