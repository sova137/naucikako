
<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">×</span>
            <h2 id="kontaktiraj-header222">KONTAKTIRAJ PREDAVA�ČA: </h2>
        </div>
        <div class="modal-body">
        <?php $profesor=null ?>
            <div class="row" >
                <div class = "col-xs-12">
                    <div href = "#" class = "thumbnail" style="background-color: rgba(254, 254, 254, 0.8); ">
                        </br>
                        <form action="/predaja-oglasa" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-xs-4 col-form-label"><b style="color:black">FAKULTET: </b></label>
                                <div class="col-md-3 col-xs-7">
                                    <input class="form-control" name="fakultet-text-input-contact" type="text" value="" id="fakultet-text-input-contact" readonly>

                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-xs-4 col-form-label"><b style="color:black">SMER: </b></label>
                                <div class="col-md-3 col-xs-7">
                                    <input name="smer-text-input-contact" class="form-control" type="text" value="" id="smer-text-input-contact" readonly>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-xs-4 col-form-label"><b style="color:black">GODINA: </b></label>
                                <div class="col-md-3 col-xs-7">
                                    <input name="godina-text-input-contact" class="form-control" type="text" value="" id="godina-text-input-contact" readonly>
                                </div>


                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-xs-4 col-form-label"><b style="color:black">PREDMET: </b></label>
                                <div class="col-md-3 col-xs-7">
                                    <input name="predmet-text-input-contact" class="form-control" type="text" value="" id="predmet-text-input-contact" readonly>
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-md-2 col-xs-12 col-form-label"><b style="color:black">EMAIL*: </b></label>

                                <div class="col-md-3 col-xs-7"><input class="form-control" name="email" id="senders-email" type="email" /></div>

                                <label for="example-text-input" class="col-md-2 col-xs-12 col-form-label"><b style="color:black">Broj telefona:</b></label>
                                <div class="col-md-3 col-xs-7">
                                    <input class="form-control" id="senders-tel" name="phonenumber" value="06" type="phone number" value="06" />
                                </div>

                            </div>
                            </br>
                            </br>
                            <div class="form-group">
                                <label for="comment"><b style="color:black">Dodaj opis: </b></label>
                                <textarea rows="5" id="req-desc" name="opis-text-input" class="form-control"  placeholder="Dodaj opis..."></textarea>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-3 col-sm-offset-2">
                                    <button href='#' type="button"  id="predaj-zahtev"  class="btn btn-sm btn-primary col-xs-12"><b align="center">Pošalji</b></button>
                                    <?php csrf_token() ?>
                                </div>
                                <div style="overflow:hidden;" class="col-md-5 col-md-offset-2 col-xs-11 col-xs-offset-0">
                                    <div id="recaptcha" class="g-recaptcha" data-sitekey="6LcfqQgUAAAAABUXxWlHrxibMomVSmhJwD0IRkZ8"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



            </div>

        </div>

    </div>
</div>

<link rel="stylesheet" href="/css/kontaktiraj-dialog.css"  />
<script src="/js/kontaktiraj.js"></script>
<script src="/js/correctTelephone.js"></script>


