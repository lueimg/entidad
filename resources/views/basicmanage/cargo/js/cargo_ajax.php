<script type="text/javascript">
var AjaxCargo={
    AgregarEditar:function(evento){
        var data=$("#ModalCargoForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDinamic/BasicManage.Cargo@New';
        if(AddEdit==0){
            url='AjaxDinamic/BasicManage.Cargo@Edit';
        }
        masterG.postAjax(url,data,evento);
    },
    Cargar:function(evento){
        url='AjaxDinamic/BasicManage.Cargo@Load';
        data={};
        masterG.postAjax(url,data,evento);
    },
    CambiarEstado:function(evento,AI,id){
        $("#ModalCargoForm").append("<input type='hidden' value='"+AI+"' name='estadof'>");
        $("#ModalCargoForm").append("<input type='hidden' value='"+id+"' name='id'>");
        var data=$("#ModalCargoForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ModalCargoForm input[type='hidden']").remove();
        url='AjaxDinamic/BasicManage.Cargo@EditStatus';
        masterG.postAjax(url,data,evento);
    }
};
</script>
