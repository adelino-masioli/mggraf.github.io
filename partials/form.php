
<!-- map section -->
<section class="api-map" id="contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 map" id="map"></div>
        </div>
    </div>
</section><!-- end of map section -->

<!-- contact section starts here -->
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="contact-caption clearfix">
                <div class="contact-heading text-center">
                    <h2>Entre em contato</h2>
                </div>

                <div class="col-md-5 contact-info text-left">
                    <h3>localização</h3>
                    <div class="info-detail">
                        <ul><li><i class="fa fa-calendar"></i><span>Segunda - Sexta-feira:</span> 9:00  às 18:00</li></ul>
                        <ul><li><i class="fa fa-map-marker"></i> Rua Leopoldo Campos Nunes - 250 - Manacás - BH - MG</li></ul>
                        <ul><li><i class="fa fa-phone"></i> (31) 3418-4783</li></ul>
                        <ul><li><i class="fa fa-whatsapp"></i> (31) 31 8485-7640</li></ul>
                        <ul><li><i class="fa fa-envelope"></i> contato@mggraf.com</li></ul>
                    </div>
                </div>


                <div class="col-md-6 col-md-offset-1 contact-form">
                    <h3>Solicite seu orçamento</h3>

                    <form class="form" method="GET" action="http://infila.com.br/emailservice/mggraf/sendmail" id="contactformvalidation">
                        <input type="hidden" name="apikey" value="mggraf.com">
                        <input class="name" name="name" type="text" placeholder="Informe seu nome" required>
                        <input class="email" type="email" name="email" placeholder="Informe seu email" required>
                        <input class="phone" type="text" name="phone" placeholder="Informe seu telefone" required>
                        <input class="name" type="text" name="product" placeholder="Informe o produto">
                        <textarea class="message" name="description" id="message" cols="30" rows="10" placeholder="Descreva sua necessidade"></textarea>
                        <input class="submit-btn" type="submit" value="ENVIAR ORÇAMENTO">
                    </form>
                </div>

            </div>
        </div>
    </div>
</section><!-- end of contact section -->