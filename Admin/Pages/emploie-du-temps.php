<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
            <li class="breadcrumb-item active">Emploi du temps de la classe de <?= $_GET['classe'] ?> </li>

        </ul>
    </div>
</div>
<div class="container">
    <h1 class="my-5">Les emplois du temps de la classe de <?= $_GET['classe'] ?></h1>
    <div class="table-responsive">
        <table class="table-emploi">
            <thead>
                <tr>
                    <th>Horaires</th>
                    <th>Lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                    <th>Samedi</th>
                    <th>Dimanche</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>07:00 à 08:00</td>
                    <td>PC</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                </tr>
                <tr>
                    <td>08:00 à 09:00</td>
                    <td>PC</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                </tr>
                <tr>
                    <td>09:00 à 10:00</td>
                    <td>PC</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                </tr>
                <tr>
                    <td>10:30 à 11:00</td>
                    <td>PC</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                </tr>
                <tr>
                    <td>11:00 à 12:30</td>
                    <td>PC</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                </tr>
                <tr>
                    <td>12:00 à 13:00</td>
                    <td>PC</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                </tr>
                <tr>
                    <td>13:00 à 14:30</td>
                    <td class="bg-dark"><a href="">p</a></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>14:30 à 15:00</td>
                    <td></td>
                    <td>Math</td>
                    <td>Math</td>
                    <td></td>
                    <td></td>
                    <td>Math</td>
                    <td></td>
                </tr>
                <tr>
                    <td>15:00 à 16:00</td>
                    <td>PC</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td></td>
                    <td>Math</td>
                    <td>Math</td>
                    <td></td>
                </tr>
                <tr>
                    <td>16:00 à 17:00</td>
                    <td>PC</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                    <td>Math</td>
                </tr>
                <tr>
                    <td>17:00 à 18:00</td>
                    <td>PC</td>
                    <td>Math</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <section>
        <div class="bnt-ajout-evenement my-5"> <a type="button" data-toggle="modal" data-target="#ajout-cours" href="">+</a> </div>
    </section>
</div>

<section>
    <div id="ajout-cours" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Ajouter un cours</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" style="margin: 20px">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="email-reponse">Classe</label>
                            <input type="email" class="form-control" name="email-reponse" id="email-reponse" aria-describedby="helpId" placeholder="" value="<?= $_GET['classe'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email-reponse">Jour du séance</label>
                            <input type="email" class="form-control" name="email-reponse" id="email-reponse" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="email-reponse">Heure de la rentrer :</label>
                            <input type="email" class="form-control" name="email-reponse" id="email-reponse" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="email-reponse">Heure de sortie</label>
                            <input type="email" class="form-control" name="email-reponse" id="email-reponse" aria-describedby="helpId" placeholder="">
                        </div>

                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Fermer la boite</button>
                            <input name="btn-repondre-message" value="Envoyer la réponse" type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>