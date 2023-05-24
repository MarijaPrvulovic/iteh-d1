<?php
    include 'login.php';
    include 'config.php';
    include 'model/Sat.php';
    include 'model/Mehanizam.php';


    $sviSatovi = Sat::vratiSveSatove($conn);

    $sveVrste = Mehanizam::vratiSveVrste($conn);

    $sveVrste1 = Mehanizam::vratiSveVrste($conn);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
 
    
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
    
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/pocetnaStyle.css">
    
</head>
<body style="   background-image: url('https://www.teahub.io/photos/full/30-308543_watch-high-definition-images-watches-wallpapers-hd.jpg');    background-repeat: no-repeat;   background-attachment: fixed;  background-size: cover;"  >
                <nav class="navbar navbar  bg-light">
                    <a class="navbar-brand" href="#"><?php echo $_SESSION['ulogovaniKorisnik']?></a>
                    <a class="nav-link" href="logout.php"   >Odjavi se</a>
                
                </nav>

    <div class="tabelaPocetna" style="background-color: 	rgb(208,208,208,0.8) ;   border-radius: 5px; padding:30px; margin:10%">
    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#addModal" >Dodaj   <i class="fas fa-plus"></i></button>
    <div class="form-outline"    style="float:right">                    
                        <input type="search" id="pretraga" class="form-control" onkeyup="pretragaPoBrendu()"    placeholder="Search.." />
                       
                    </div>
    <button type="button" class="btn btn-primary" style="float:right">
                        <i class="fas fa-search"></i>
                      </button>
                      <br><br>
                      <button type="button" class="btn btn-warning" onclick="sortiraj()">Sortiraj<i class="fa fa-sort" aria-hidden="true" ></i></button>
                      <select name="kriterijum" id="kriterijum" class="criteria">
                          <option value="price">Cena</option> 
                          <option value="name">Model</option>
                    </select>
    <br><br><br><br>
        <table class="table table-striped" id="satoviTbl">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Model</th>
                <th scope="col">Brend</th>
                <th scope="col">Cena</th>
                <th scope="col">Materijal narukvice</th>
                <th scope="col">Vrsta</th>
                <th scope="col">Opcije</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    while($red=$sviSatovi->fetch_array()):
                        
                ?>
                          <tr>
                            <th scope="row"><?php echo $red['id']?></th>
                            <td>  <?php echo $red['model']?></td>
                            <td> <?php echo $red['brend']?></td>
                            <td> <?php echo $red['cena']?></td>
                            <td> <?php echo $red['materijalNarukvice']?></td>
                            <td> <?php echo $red['naziv']?></td> 
                            <td>
                                <form action="" method="post">
                                <button type="button" class="btn btn-success"    data-toggle="modal" data-target="#updateModal" onclick="azurirajSat(<?php echo $red['id']?>)"  >   <i class="fas fa-pencil-alt"></i> </button> 
                                <button type="button" class="btn btn-danger"  onclick="obrisiSat(<?php echo $red['id']?>)"  ><i class="fas fa-trash"></i></button>  
                                </form>
                            </td>
                          
                        </tr>



                <?php endwhile;?>
            </tbody>
        </table>



    </div>







        <!-- Modal za add new sat -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="lblAddNewModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleAdd">Dodaj novi sat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                              
                        <form  id="addform" style="max-width:500px;margin:auto" method="POST" enctype="multipart/form-data">
 
                            <div class="input-container">
                            <i class="fa fa-clock"></i>
                                <input class="input-field" type="text" placeholder="Model" name="model" id="model" required>
                            </div>
                            <br>
                            <div class="input-container">
                                <i class="fa fa-pencil icon"></i>
                                <input class="input-field" type="text" placeholder="Brend" name="brend" id="brend" required>
                            </div>
                            <br>
                            <div class="input-container">
                            <i class="fa fa-tag icon"></i>
                                <input class="input-field" type="text" placeholder="Cena" name="cena" id="cena" required>
                            </div>
                            <br>
                            <div class="input-container">
                            <i class="fa fa-pencil icon"></i>
                                <input class="input-field" type="text" placeholder="Materijal narukvice" name="materijal" id="materijal" required>
                            </div> <br>
                            <div class="input-container">
                            <i class="fa fa-gear"></i>
                             <label for="vrste">Mehanizam:</label>

                            <select name="vrste" id="vrste">
                                <?php while($redV=$sveVrste->fetch_array()):?>
                                    <option value=<?php echo $redV['idMeh']?>><?php echo $redV['naziv']?></option>
                                <?php endwhile;?>
                           
                            
                            </select>
                            </div>
                            <br>
                       
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="add" name="add" onclick="dodaj()"> <i class="fas fa-plus"></i> Add</button>
                        </div>                   
                    
                        </form>


                        </div>
                        
                       
                </div>
            </div>
        </div>



        <!-- Modal za update sata -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="lblUpdateModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleAdd">Izmeni sat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                              
                        <form  id="updateform" style="max-width:500px;margin:auto" method="POST" enctype="multipart/form-data">
 
                            <input type="text" name="idU" id="idU" hidden>

                            <div class="input-container">
                                <i class="fa fa-clock"></i>
                                <input class="input-field" type="text" placeholder="Model" name="modelU" id="modelU" required>
                            </div>
                            <br>
                            <div class="input-container">
                                <i class="fa fa-pencil icon"></i>
                                <input class="input-field" type="text" placeholder="Brend" name="brendU" id="brendU" required>
                            </div>
                            <br>
                            <div class="input-container">
                            <i class="fa fa-tag icon"></i>
                                <input class="input-field" type="text" placeholder="Cena" name="cenaU" id="cenaU" required>
                            </div>
                            <br>
                            <div class="input-container">
                            <i class="fa fa-pencil icon"></i>
                                <input class="input-field" type="text" placeholder="Materijal narukvice" name="materijalU" id="materijalU" required>
                            </div> <br>
                            <div class="input-container">
                             <i class="fa fa-gear"></i>
                             <label for="vrste">Mehanizam:</label>

                            <select name="vrsteU" id="vrsteU">
                                <?php while($redV=$sveVrste1->fetch_array()):?>
                                    <option value=<?php echo $redV['idMeh']?>><?php echo $redV['naziv']?></option>
                                <?php endwhile;?>
                           
                            
                            </select>
                            </div> <br>

                       
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="update" name="update" onclick="potvrdiAzuriranje()"> Azuriraj</button>
                        </div>                   
                    
                        </form>


                        </div>
                        
                       
                </div>
            </div>
        </div>





























<script src="js/main.js"></script>
 <script src="https://code.jquery.com/jquery-3.1.1.min.js">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>