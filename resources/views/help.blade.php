
@extends('layouts.app')

@section('content')



        <div class="container">

                    <div class="thumbnail">
                    <h2 align="center">Pomoć</h2><br>

                    <div id="content" style="padding-left: 10px">
                        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                            <li class="active"><a href="#faq" data-toggle="tab">Najčešća pitanja i odgovori</a></li>
                            <li><a href="#pravila" data-toggle="tab">Pravila i uslovi korišćenja</a></li>
                            <li><a href="#about" data-toggle="tab">O nama</a></li>
                            <li><a href="#pricing" data-toggle="tab">Cenovnik</a></li>

                        </ul>
                        <div id="my-tab-content" class="tab-content">
                            <div class="tab-pane active" id="faq">


                                <div class="articles">

                                    <div class="article current">
                                        <div class="item row">
                                            <div class="col-xs-3">
                                                <p class="source"></p>
                                            </div>
                                            <div class="col-xs-6">
                                                <p class="title">Kako postaviti oglas</p>
                                            </div>
                                            <div class="col-xs-3">
                                                <p class="pubdate"></p>
                                            </div>
                                        </div>
                                        <div class="description row">
                                            <div class="col-xs-3">&nbsp;</div>
                                            <div class="col-xs-6">
                                                    <div class="description-text">
                                                        <p>Klikom na &ldquo;Predaj oglas za predmet&rdquo; (crveno dugme u gornjem desnom uglu) otvara se prvi od tri koraka za predaju oglasa:</p>
                                                        <ol>
                                                            <li><strong> Izaberite kategoriju</strong></li>
                                                        </ol>
                                                        <p>Izaberite fakultet, smer, godinu i predmet za koji želite da ostavite Va&scaron; oglas. Kliknite na dugme &ldquo;Dalje&rdquo; nakon čega će se otvoriti formular za unos podataka o oglasu.</p>
                                                        <ol start="2">
                                                            <li><strong> Unesite podatke o oglasu</strong></li>
                                                        </ol>
                                                        <p>Popunite polja traženim podacima i detaljnim opisom. Neophodno je da popunite polja koja su obavezna za popunjavanje (označena *) jer u suprotnom nije moguće predati oglas. Samo registrovani korisnici mogu predati oglas.</p>
                                                        <p>U slučaju da niste registrovani na sajtu Nauči Kako, kliknite na dugme &bdquo;Registracija&ldquo; koje se nalazi u gornjem desnom uglu stranice i ispunite obrazac za registraciju novih korisnika. Po obavljenoj registraciji, na navedenu e-mail adresu iz registracione forme, biće Vam upućen aktivacioni link preko kojeg možete aktivirati svoj nalog. Klikom na link za aktivaciju dovr&scaron;en je proces registracije i možete početi sa ogla&scaron;avanjem.</p>
                                                        <p>Napomena: u slučaju da Vam registracioni e-mail ne stigne, proverite spam folder, možda je registracioni e-mail zavr&scaron;io tamo.</p>
                                                        <ol start="3">
                                                            <li><strong> Izaberite tip oglasa</strong></li>
                                                        </ol>
                                                        <p>Izaberite jedan od nekoliko ponuđenih tipova oglasa. Ukoliko ste izabrali Standardni mali oglas, kliknite na dugme &ldquo;Predaj oglas&rdquo; i time ste zavr&scaron;ili proces predaje oglasa.</p>
                                                    </div>


                                            </div>
                                            <div class="col-xs-3">&nbsp;</div>
                                        </div>
                                    </div>


                                    <div class="article">
                                        <div class="item row">
                                            <div class="col-xs-3">
                                                <p class="source"></p>
                                            </div>
                                            <div class="col-xs-6">
                                                <p class="title">Da li je oglašavanje besplatno?</p>
                                            </div>
                                            <div class="col-xs-3">
                                                <p class="pubdate"></p>
                                            </div>
                                        </div>
                                        <div class="description row">
                                            <div class="col-xs-3">&nbsp;</div>
                                            <div class="col-xs-6">
                                                <div class="description-text">
                                                    <p><strong>Da, postavljanje Standardnog malog oglasa je potpuno besplatno.</strong></p>
                                                    <p>Izuzetak je kategorija: Istaknuti oglas.</p>
                                                </div>
                                            <div class="col-xs-3">&nbsp;</div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>


                            <div class="tab-pane" id="pravila">

                                <div class="faq-section">
                                    <br>
                                    <ul>

                                            <div class="description-text visible text block">
                                                <p><b>1. Registracija</b></p>
                                                <p>Za kori&scaron;ćenje usluga sajta <a href="http://www.naucikako.com/" target=""><span style="text-decoration: underline;">www.naucikako.com</span></a> neophodna je registracija, koja je besplatna. Registrovani korisnik koji je postavio oglas ima sva prava i obaveze proistekla iz Zakona o ogla&scaron;avanju Republike Srbije. Fizičko ili pravno lice može imati i koristiti samo jedan registrovan nalog.</p>
                                                <p><b>2. Sadržaj oglasa</b></p>
                                                <p>Prema Zakonu o ogla&scaron;avanju zabranjen je svaki vid obmanjujućeg, prikrivenog i upoređujućeg ogla&scaron;avanja kojim se dovode u zabludu primaoci oglasne poruke. Oglas treba da sadrži isključivo podatke o predmetu za koji oglašavač nudi pomoć, strogo je zabranjeno isticanje bilo kakve novčane naknade.</p>
                                                <p><b>3. Zabrana ogla&scaron;avanja</b></p>

                                                <p><b>4. Stopiranje oglasa</b></p>
                                                <p>Oglas može biti stopiran iz sledećih razloga:</p>
                                                <ul>
                                                    <li><b>Tekst oglasa nije u skladu sa Zakonom o ogla&scaron;avanju i uređivačkom politikom NaučiKako sajta.</b></li>
                                                    </ul>
                                                <p><b>5. Stopiranje fotografije u oglasu</b></p>
                                                <p>Kao registrovani korisnik možete postaviti svoju profilnu sliku.
                                                    Nije dozvoljeno objavljivanje fotografija:</p>
                                                <ul>
                                                    <li>Neprimerenog sadržaja</li>
                                                    <li>Fotografije koje sadrže web ili e-mail adesu ogla&scaron;ivača.</li>
                                                </ul>

                                                <p><b>6. Obave&scaron;tavanje na mejl i telefon korisnika</b></p>
                                                <p>Registracijom korisnik pristaje na periodično primanje mejlova od NaučiKako za obave&scaron;tavanje o statusu oglasa, odnosno poruka na mobilni telefon ukoliko on to želi. Korisniku je na stranici "Pode&scaron;avanja" u profilu omogućeno da promeni mejl ili svoj broj telefona.
                                                    Prilikom predaje svog prvog oglasa korisniku će biti zatražen unos mobilnog telefona kao sredstvo koje će sajtu služiti da lakše obaveštava korisnika o ponudama za oglas. Sajt NaučiKako se obavezuje da korisnikov broj telefona neće deliti i zloupotrebljavati.
                                                    Prilikom predaje svakog oglasa korisniku se nudi mogućnost da obaveštenja o pristiglim ponudama za oglas pored samog mejla dobije i kao SMS poruku.
                                                    Korisniku je na stranici "Moji predmeti" omogućeno da promeni opis oglasa za pružanje pomoći za dati predmet, da promeni opciju obaveštavanja SMS-om ili da u potpunosti obriše oglas.
                                                </p>
                                                <p><b>7. Upotreba i za&scaron;tita podataka</b></p>
                                                <p>NaučiKako su dužni da za&scaron;tite privatnost ličnih podataka ogla&scaron;ivača u skladu sa Zakonom o autorskim i srodnim pravima. NaučiKako prikuplja samo nužne i osnovne podatke o ogla&scaron;ivačima, kao i one propisane Zakonom o ogla&scaron;avanju, informi&scaron;u korisnike o načinu njihovog kori&scaron;ćenja i redovno daju korisnicima mogućnost izbora o upotrebi njihovih podataka.</p>
                                                <p><b>8. Dozvoljeno je samo lično kori&scaron;ćenje</b></p>
                                                <p>Ovaj sajt je namenjen isključivo ličnom, a ne komercijalnom kori&scaron;ćenju. U tom smislu je zabranjeno preuzimanje sadržaja, njegovo kopiranje, prikazivanje, reprodukovanje, objavljivanje, licenciranje, prerada, prodaja, preoblikovanje i objavljivanje na drugim sajtovima ili "preslikavanje" početne strane sajta, niti bilo koje druge strane odnosno bilo kog dela sadržaja na nekom drugom sajtu, &scaron;to se smatra povredom Zakona o autorskim i srodnim pravima. Takođe je zabranjena zloupotreba svih podataka na&scaron;ih ogla&scaron;ivača od strane drugih pravnih ili fizičkih lica, a u cilju nuđenja svojih usluga i mogućnosti ogla&scaron;avanja putem drugih medija. Zabranjen je svaki vid zloupotrebe registracije. NaučiKako zadržava pravo da obustave ogla&scaron;avanje ukoliko utvrde da se fizičko lice ogla&scaron;ava preko vi&scaron;e naloga i na taj način ogla&scaron;ava vi&scaron;e od dozvoljenih besplatnih oglasa ili da se pravno lice registrovalo u delu predviđenom za fizička lica i kao takvo objavilo oglasnu poruku.</p>
                                                <p><b>9. Za&scaron;tita autorskih prava</b></p>
                                                <p>Podaci na sajtu su za&scaron;tićeni Zakonom o autorskim i srodnim pravima, a autorska prava se odnose na sadržaj sajta, tekstove, njihovo oblikovanje, slikovne sadržaje, grafičke i druge prikaze koji pripadaju NaučiKako oglasima. Podaci se mogu koristiti samo na način i pod uslovima predviđenim ovim uslovima kori&scaron;ćenja. Svi podaci o korisnicima/kupcima se strogo čuvaju i dostupni su samo zaposlenima, koji su dužni da po&scaron;tuju načelo za&scaron;tite privatnosti.</p>
                                                <p><b>10. Odgovornost</b></p>
                                                <p><b></b>NaučiKako ne odgovara za:</p>
                                                <ul>
                                                    <li>tačnost, sadržinu, kompletnost, zakonitost, pouzdanost ili dostupnost informacija i sadržaja prikazanih na sajtu, osim onih koje se odnose na usluge NaučiKako sajta, za koje odgovara u skladu sa Op&scaron;tim uslovima za dostupnost i pružanje tih usluga, u skladu sa zakonskom regulativom koja reguli&scaron;e tu oblast.</li>
                                                    <li>brisanje, pogre&scaron;no dostavljanje ili neblagovremeno dostavljanje bilo kakvih informacija ili sadržaja, za gre&scaron;ke na stranicama ili za kontinuirano funkcionisanje sajta.</li>
                                                    <li>bilo kakvu &scaron;tetu nastalu skidanjem fajlova ili pristupom bilo kakvom sadržaju na Internetu, do koga se do&scaron;lo pomoću ovih sajtova. Kori&scaron;ćenjem sajtova prihvatate punu odgovornost za bilo kakvu &scaron;tetu nastalu zbog informacija do kojih ste do&scaron;li pomoću ovog sajta, za &scaron;tetu nastalu učitavanjem fajlova i dokumenata na va&scaron; računar i za bilo koji drugi vid &scaron;tete nastao zbog bilo kakvih sadržaja do kojih ste do&scaron;li pomoću ovog sajta. NaučiKako zadržava pravo da iz dalje upotrebe stranica isključi onog korisnika koji zloupotrebljava ili na bilo koji način neovla&scaron;ćeno koristi ovaj sajt.</li>
                                                    <li>svi eventualni sporovi nastali iz odnosa ogla&scaron;ivača i korisnika re&scaron;avaju se isključivo između ogla&scaron;ivača i korisnika. NaučiKako nije odgovoran za &scaron;tetu bilo koje vrste nastale kao posledica takvih odnosa.</li>
                                                </ul>
                                                <p>Takođe i:</p>
                                                <ul>
                                                    <li>za pravilno ili nepravilno kori&scaron;ćenje sajta, kao i za eventualnu &scaron;tetu koja nastane po tom osnovu,</li>
                                                    <li>za bilo kakvu &scaron;tetu koju korisnik pretrpi pravilnim ili nepravilnim kori&scaron;ćenjem sajta, kao i drugih informacija, servisa, usluga, saveta ili proizvoda do kojih se do&scaron;lo pomoću linkova ili reklama na sajtu, ili onih koje su na bilo koji način povezane sa sajtom.</li>
                                                    <li>za nepravilno funkcionisanje ili prekid rada servisa, koji je prouzrokovan direktno ili indirektno prirodnim silama ili drugim uzrocima van razumne moći kontrole, u &scaron;ta spadaju: problemi u funkcionisanju Interneta, kvarovi na kompjuterskoj opremi, problemi u funkcionisanju telekomunikacione opreme i uređaja, nestanak struje, &scaron;trajkovi, obustave rada, nemiri, nesta&scaron;ice sadržaja ili manjak radne snage, naredbe državnih i drugih organa. Svi stavovi izneti u okviru sajta nisu stavovi NaučiKako, već ih na sajtu samo prenosimo "onakve kakve jesu" i za njihovu sadržinu nismo odgovorni u bilo kom smislu. Ukoliko je korisnik prekr&scaron;io autorsko pravo trećeg lica, svu odgovornost snosi sam, a NaučiKako će nakon prijema obave&scaron;tenja o eventualnom kr&scaron;enju autorskog prava, ukloniti naznačeni sadržaj do razre&scaron;enja spora, po osnovu povrede bilo kog autorskog ili drugog srodnog prava. Ogla&scaron;ivač koji se odlučio da učini javnim bilo koje podatke koji omogućavaju ličnu identifikaciju, čini to na sopstvenu odgovornost.</li>
                                                </ul>
                                                <p><b>11. Pristanak na pravila i uslove kori&scaron;ćenja sajta</b></p>
                                                <p>Samim kori&scaron;ćenjem sajta pristajete na ove uslove i nikakav poseban pristanak od strane korisnika nije potreban da bi ga ovi uslovi obavezivali. Poznavanje ovih Pravila i uslova kori&scaron;ćenja sajta u svakom trenutku predstavlja obavezu korisnika sajta.</p>
                                            </div>
                                            <br>
                                        </li>
                                    </ul>
                                </div>









                    </div>
                            <div class="tab-pane" id="pricing">


                                <div class="faq-section">
                                    <br>
                                    <ul>

                                        <div class="description-text visible text block">
                                            <p><strong>Postavljanje Standardnog malog oglasa je potpuno besplatno.</strong></p>
                                            <p>Izuzetak je kategorija: Istaknuti oglas.</p>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane" id="about">

                                <div class="faq-section">
                                    <br>
                                    <ul>

                                        <div class="description-text visible text block">
                                            <p><strong>Nauci Kako Team</strong></p>

                                        </div>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script src="/js/articles.js"></script>
    <link href="/css/articles.css" rel="stylesheet">
@endsection