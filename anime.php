<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include 'scripts/head.php'; ?>
    <!-- Script -->
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script>
    $(document).ready(function(){

                console.log($(document).find('.anime'))
                $(document).find('.anime').hide()
                $(document).find('.saison').hide()
                $(document).find('.episode').hide()

                $("input[name$='contact']").click(function () {
                var inputValue = $(this).val();
                if (inputValue === "animeButton") {
                        $(document).find('.anime').show()
                        $(document).find('.saison').hide()
                        $(document).find('.episode').hide()

                        $(document).find("input[name*='EpisodeBox']").val(null)
                        $(document).find("input[name*='SaisonBox']").val(null)

                        $("input[name*='AnimeBox']").attr("required", true)
                        $("input[name*='SaisonBox']").removeAttr("required")
                        $("input[name*='EpisodeBox']").removeAttr("required")
                    } 
                    else if(inputValue === "saisonButton"){
                        $(document).find('.anime').hide()
                        $(document).find('.saison').show()
                        $(document).find('.episode').hide()

                        $(document).find("input[name*='AnimeBox']").val(null)
                        $(document).find("input[name*='EpisodeBox']").val(null)

                        $("input[name*='AnimeBox']").removeAttr("required")
                        $("input[name*='SaisonBox']").attr("required", true)
                        $("input[name*='EpisodeBox']").removeAttr("required")
                    }
                    else {
                        $(document).find('.anime').hide()
                        $(document).find('.saison').hide()
                        $(document).find('.episode').show()

                        $(document).find("input[name*='AnimeBox']").val(null)
                        $(document).find("input[name*='SaisonBox']").val(null)

                        $("input[name*='AnimeBox']").removeAttr("required")
                        $("input[name*='SaisonBox']").removeAttr("required")
                        $("input[name*='EpisodeBox']").attr("required", true)
                    }

                var affichage = false;
        $("#div1").hide();

        ;});


        });
    </script>
    <?php $perm = 1; ?>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <?php include 'scripts/header.php'; ?>
    </header>
    <!-- Header End -->
    
    <!-- Main pour add un anime / saison / épisode -->
    </br>
    <body>
        <div class="d-flex flex-column align-items-center justify-content-center">
            <h3><font color="white">Cliquez pour choisir une option</font></h3>
            <div>
                <input id="contactChoice1" type="radio" class="Choix01" name="contact" value="animeButton">
                <label for="contactChoice1"><font color="white">Ani</font><font color="FF4747">me</font></label>

                <input id="contactChoice2" type="radio" class="Choix02" name="contact" value="saisonButton">
                <label for="contactChoice2"><font color="white">Sais</font><font color="FF4747">on</font></label>

                <input id="contactChoice3" type="radio" class="Choix03" name="contact" value="episodeButton">
                <label for="contactChoice3"><font color="white">Épiso</font><font color="FF4747">de</font></label>
            </div>

            <form class="d-flex flex-column align-items-center justify-content-center" action="scripts/insert.php?action=1" method="post">
                <div class="anime">
                    <p>Nom de l'anime</p>
                    <input name="AnimeBoxNomAnime" type="text" style="width:250px" required> 
                    <p>Nombre de saison(s)</p>
                    <input name="AnimeBoxNbSaison" type="number" style="width:250px" min ="0" required> 

                    <p>Nombre de total d'épisode</p>
                    <input name="AnimeBoxNbTotal" type="number" style="width:250px" min="0" required> 

                    <p>Etat de l'anime</p>
                    <input name="AnimeBoxEtatAnime" type="name" style="width:250px" required> 

                    <p>Description de l'anime</p>
                    <input name="AnimeBoxDescAnime" type="name" style="width:250px" required> 

                    <p>Image de l'anime</p>
                    <input name="AnimeBoxImageAnime" type="text" style="width:250px" required> 

                    <p>Note de l'anime</p>
                    <input name="AnimeBoxNoteAnime" type="number" style="width:250px" step="0.1" min = "0" max="10" required>  
                    </br> </br> 
                    <input type="submit" style="margin-left : 80px">
                </div>
            </form>
            <form class="d-flex flex-column align-items-center justify-content-center" action="scripts/insert.php?action=2" method="post">       
                <div class="saison" id="Saison">
                    <div class="table-responsive table-dark w-75 text-center" style="height:250px">
                        <!-- <select id="SaisonBoxSelect" name="SaisonBoxSelect" size="5" style="width:250px" > 
                            Ajout des animes avec le php
                        </select>  -->
                        <table class="table table-striped table-hover table-sm ">

                            <thead>
                                <tr class="table-light">
                                <th scope="col">I<font color="FF4747">d</font></th>
                                <th scope="col">Nom ani<font color="FF4747">me</font></th>
                                </tr>
                            </thead>
                            <tbody id="animeTable">
                                <!-- <tr class="table-dark">
                                <td>Flaamby</td>
                                <td>flaambyDEC@gmail.com</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    </br></br>                        
                    <p>Nom de la saison (arc)</p>
                    <input name="SaisonBoxNom" type="name" style="width:250px" required>

                    <p>Numéro de la saison</p>
                    <input name="SaisonBoxNumSaison" type="name" style="width:250px" required>  
                    
                    <p>Nombre d'épisode de la saison</p>
                    <input name="SaisonBoxNbSaison" type="number" min = "0" style="width:250px" required>  

                    <p>État de la saison</p>
                    <select name="SaisonBoxEtatSaison" style="width:250px" required>
                        <option value="terminer">Terminé</option>
                        <option value="En cours">En cours</option>
                    </select>
						</br></br>  
                    <p>Id de l'anime</p>
                    <input name="SaisonBoxIDSaison" type="number" min = "0" style="width:250px" required>

                    <p>Studio de la saison</p>
                    <input name="SaisonBoxStudioSaison" type="name" style="width:250px" required> 
                    </br></br> 
                    <input type="submit" style="margin-left : 80px"> 
                </div>
            </form>
            <form class="d-flex flex-column align-items-center justify-content-center" action="scripts/insert.php?action=3" method="post">
                <div class="episode">
                    <p>Nom de l'épisode</p>
                    <input name="EpisodeBoxNom" type="name" style="width:250px" required>

                    <p>Numéro de l'épisode</p>
                    <input name="EpisodeBoxNbEpisode" type="number" min = "0" style="width:250px" required>
                    
                    <p>Numéro de la saison</p>
                    <input name="EpisodeBoxNumEpisode" type="name" style="width:250px" required> 

                    <p>Id de l'anime</p>
                    <input name="EpisodeBoxIdAnime" type="number" min = "0" style="width:250px" required>
                    </br></br>
                    <input type="submit" style="margin-left : 80px">
                </div>
            </form>
        </div>
    </body>

    </br></br></br></br></br>
	<!-- Footer Section Begin -->
	<footer class="footer">
		<?php include 'scripts/footer.php'; ?>
	</footer>
	<!-- Footer Section End -->

<!-- Js Plugins -->
<?php include 'scripts/jsPlugin.php'; ?>
<!-- <script>
    function setSize(){
        document.getElementById("AnimeSelect").setAttribute("size", "2")
        // onmousedown="if(this.options.length>3){this.size=3;}"  onchange='this.size=0;' onblur="this.size=0;">" onblur="this.size=0" 
    }
</script> -->

<script src="js/selectAnime.js"></script>

</body>

</html>