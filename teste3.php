<html>
<head>
<script type="text/javascript">
function id( el ){
        return document.getElementById( el );
}
function total( un, qnt )
{
        return un * qnt;
}
window.onload = function()
{
        id('valor_unitario').onkeyup = function()
        {
                id('total').value = total( this.value , id('qnt').value );
        }      
        id('qnt').onkeyup = function()
        {
                id('total').value = total( id('valor_unitario').value , this.value );
        }
}
</script>
</head>
<body>
        <form action="" method="post">
                Valor Unitário: <input type="text" name="valor_unitario" id="valor_unitario" />
                Quantidade: <input type="text" name="qnt" id="qnt" value="0" />
                Total: <input type="text" name="total" id="total" readonly="readonly" />
        </form>
</body>
</html>