<form method="get">
    <label>Quantidade de sabores</label>
    <select id="sabores" name="sabores">
        <option value="1" selected>1 sabor</option>
        <option value="2">2 sabores</option>
    </select><br>
    <div id="qtdsabores" name="qtdsabores">
        <label>Sabor 1:</label>
        <select id="sabor1" name="sabor1">
            <option value="Frango com Catupiry">Frango com Catupiry</option>
            <option value="Calabreza">Calabreza</option>
        </select><br>
    </div>
    <br>Borda
    <input type="radio" id="semborda" name="borda" value="nao" checked>
    <label>Não</label>
    <input type="radio" id="borda" name="borda" value="sim">
    <label>Sim</label><br>
    <div id="sabor_borda">

    </div>
    <div id="tabela">

    </div>
    <input type="submit" value="Pedir pizza" id="pedir" name="pedir">
</form>
<?php 
    if(isset($_GET["pedir"])){
        $sabor1 = $_GET['sabor1'];
        $sabores = $_GET['sabores'];
        if($sabores>1){
            $sabor2 = $_GET['sabor2'];
        }else{$sabor2="[sem sabor]";}
        $borda = $_GET['borda'];

        if($borda=="sim"){
            $saborBorda = $_GET['bordinha'];
        }else{$saborBorda="[sem sabor]";}

        echo "
        <table>
            <div style='width:100%;background-color: black;color: white;'>Tabela Pedidos</div>
        <thead>
                    <tr>
                        <th>id</th>
                        <th>sabores</th>
                        <th>sabor_1</th>
                        <th>sabor_2</th>
                        <th>borda</th>
                        <th>sabor_borda</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>$sabores</th>
                        <th>$sabor1</th>
                        <th>$sabor2</th>
                        <th>$borda</th>
                        <th>$saborBorda</th>
                    </tr>
                </tbody>
            </table>
        ";

        try{

        }catch(PDOException $e){

        }
    }
?>
<style>
    tr{
        background-color: black;
        color: white;
    }
</style>
<script>
    sabores = document.getElementById("sabores")
    qtdsabores = 1
    sabores.addEventListener("change",()=>{
        if(sabores.value==1){
            document.getElementById("qtdsabores").innerHTML=
            '<label>Sabor 1:</label>'+
            '<select id="sabor1" name="sabor1">'+
            '<option value="Frango com Catupiry">Frango com Catupiry</option>'+
            '<option value="Calabreza">Calabreza</option>'+
            '</select><br>'
            qtdsabores = 1
        }else{
            document.getElementById("qtdsabores").innerHTML=
            '<label>Sabor 1:</label>'+
            '<select id="sabor1" name="sabor1">'+
            '<option value="Frango com Catupiry">Frango com Catupiry</option>'+
            '<option value="Calabreza">Calabreza</option>'+
            '</select><br>'+
            '<label>Sabor 2:</label>'+
            '<select id="sabor2" name="sabor2">'+
            '<option value="Frango com Catupiry">Frango com Catupiry</option>'+
            '<option value="Calabreza">Calabreza</option>'+
            '</select>'
            qtdsabores = 2
        }
        sabor2 = document.getElementById("sabor2")
    })

    floatboarda = 0
    sabor1 = document.getElementById("sabor1")
    semborda = document.getElementById("semborda")
    semborda.addEventListener("click",()=>{
        bordinha.value=""
        sabor_borda.innerHTML=""
        floatboarda = 0
    })
    borda = document.getElementById("borda")
    sabor_borda = document.getElementById("sabor_borda")
    borda.addEventListener("click",()=>{
        floatboarda = 1
        sabor_borda.innerHTML="<select id='bordinha' name='bordinha'><option value='Chocolate'>Chocolate</option><option value='Catupiri'>Catupiri</option></select>"
        bordinha = document.getElementById("bordinha")
    })

    document.getElementById("pedir").addEventListener("click",()=>{
        if(floatboarda==1 && qtdsabores==1){
            console.log("O cliente pediu uma pizza do sabor "+sabor1.value+" com borda sabor "+bordinha.value)
        }else if(floatboarda==0 && qtdsabores==1){
            console.log("O cliente pediu uma pizza do sabor "+sabor1.value+" sem borda")
        }else if(floatboarda==0 && qtdsabores==2){
            console.log("O cliente pediu uma pizza metade "+sabor1.value+" e metade "+sabor2.value+" sem borda")
        }else if(floatboarda==1 && qtdsabores==2){
            console.log("O cliente pediu uma pizza metade "+sabor1.value+" e metade "+sabor2.value+" com borda sabor "+bordinha.value)
        }
    })
</script>