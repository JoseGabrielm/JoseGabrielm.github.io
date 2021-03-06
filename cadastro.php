<?php include('include/header.php') ?>


<?php
include('class/ClassCrud.php');

    if(isset($_GET['id'])){
          $acao="editar";

          $Crud=new ClassCrud();
          $BFetch=$Crud->selectDB(" t.*, t.rowid ","CST_MAD_TERC_BACKUP t","where ID=?", array($_GET['id']));
          $Fetch=$BFetch->fetch(PDO::FETCH_ASSOC);
          $id=$Fetch['ID'];
          $cd_horto=$Fetch['CD_HORTO'];
          $nm_horto=$Fetch['NM_HORTO'];
          $dt_ano_ref=$Fetch['DT_ANO_REF'];
          $cd_casca=$Fetch['CD_CASCA'];
          $sg_estado_federativo=$Fetch['SG_ESTADO_FEDERATIVO'];
          $vl_mad_neg=$Fetch['VL_MAD_NEG'];
          $vl_mad_po=$Fetch['VL_MAD_PO'];
          $contrato=$Fetch['CONTRATO'];
          
    }else{
          $acao="cadastrar";
          $id="";
          $cd_horto="";
          $nm_horto="";
          $dt_ano_ref="";
          $cd_casca="";
          $sg_estado_federativo="";
          $vl_mad_neg="";
          $vl_mad_po="";
          $contrato="";
          
         
    }

?>

<body>

<header class="text-center mt-4">
   <h1><?php echo $acao; ?></h1>
    <hr> 
    
<div class="container mt-4">
  <form name="formcadastro" id="formcadastro" method="post" action="controllers/ControllerCadastro.php" >
  <div class="form-group text-left">

    <input type="hidden" id="acao" name="acao" value="<?php echo $acao; ?>">

    <input type="hidden" id="ID" name="ID" value="<?php echo $id; ?>">
    
   
  <div class='row'>
  <div class='col-md-4'>
  <label class="" for="">NOME</label>
    <input type="text" class="form-control" id="NM_HORTO" name="NM_HORTO" placeholder="" value="<?php echo $nm_horto; ?>">
    
    </div>
    <div class='col-md-2'>
    <label class="" for="">ANO DE REFERENCIA</label>
    <input type="number" class="form-control" id="DT_ANO_REF" name="DT_ANO_REF" placeholder="" value="<?php echo $dt_ano_ref; ?>">
  
    </div>
    <div class="col-md-6">
    <label for="">CÓDIGO</label>
    <input type="number" class="form-control col-md-2" id="CD_HORTO" name="CD_HORTO" placeholder="" value="<?php echo $cd_horto; ?>">
    </div>
    </div>

<div class="row">
<div class ="col-md-2">
    <label class="mt-4"for="">CD CASCA</label>
    <input type="text" class="form-control" id="CD_CASCA" name="CD_CASCA" placeholder="" value="<?php echo $cd_casca; ?>">
  </div>  
  <div class ="col-md-2">
  <label class="mt-4"for="">VL MAD PO</label>
    <input type="text" class="form-control" id="VL_MAD_PO" name="VL_MAD_PO" placeholder="" value="<?php echo $vl_mad_po; ?>">

  </div>
  <div class ="col-md-2">
    <label class="mt-4"for="">VL MAD NEG</label>
    <input type="text" class="form-control" id="VL_MAD_NEG" name="VL_MAD_NEG" placeholder="" value="<?php echo $vl_mad_neg; ?>">
  </div>
  </div>

<div class="row">
  <div class="col-md-2">
  <label class="mt-4" for="">ESTADO</label>
    <select class="form-control" id="SG_ESTADO_FEDERATIVO" name="SG_ESTADO_FEDERATIVO" >
      <option value="<?php echo $sg_estado_federativo; ?>"><?php echo $sg_estado_federativo; ?></option>
      <option>SP</option>
      <option>MG</option>
    </select>
  </div>
<div class="col-md-6">
  <label class="mt-4" for="">Nº DE CONTRATO</label>
    <input type="text" class="form-control" id="CONTRATO" name="CONTRATO" placeholder="" value="<?php echo $contrato; ?>">
  </div>

</div>



    <button type="submit" class="btn btn-primary mt-4 mb-2" value=""><?php echo $acao; ?></button>

  
  
  </div>
  </form>
</div>





</body>
<?php include('include/footer.php') ?>


