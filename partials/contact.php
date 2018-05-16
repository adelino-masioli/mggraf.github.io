<!-- about section -->
<section class="about text-center" id="about">
    <div class="container">
        <div class="row">
            <h2>ENTRE EM CONTATO</h2>
            <h4>Favor preencher o formulário abaixo para tirar dúvidas sobre nossos produtos, ou orçamentos.</h4>

        </div>
    </div>
</section><!-- end of about section -->


<!-- contact section starts here -->
<section class="contacts">
    <div class="container">
        <div class="row">
            <div class="about clearfix">


                <div class="col-md-5 contact-info text-left form-only">
                    <h3>localização</h3>
                    <div class="info-detail">
                        <ul><li><i class="fa fa-calendar"></i><span>Segunda - Sexta-feira:</span> 9:00  às 18:00</li></ul>
                        <ul><li><i class="fa fa-map-marker"></i> Rua Leopoldo Campos Nunes - 250 - Manacás - BH - MG</li></ul>
                        <ul><li><i class="fa fa-phone"></i> (31) 3418-4783</li></ul>
                        <ul><li><i class="fa fa-whatsapp"></i> (31) 31 8485-7640</li></ul>
                        <ul><li><i class="fa fa-envelope"></i> contato@mggraf.com</li></ul>
                    </div>
                </div>


                <div class="col-md-6 col-md-offset-1 contact-form form-only">
                    <h3>Solicite seu orçamento</h3>

                    <form class="form" method="GET" action="http://frecar.com.br/api/emailservice/sendmail" id="contactformvalidation">
                        <input type="hidden" name="apikey" value="mggraf.com">
                        <input class="name" name="name" id="txtname" type="text" placeholder="Informe seu nome"  required>
                        <input class="email" type="email" name="email" id="txtemail" placeholder="Informe seu email" required>
                        <input class="phone" type="text" name="phone" id="txtphone" placeholder="Informe seu telefone">
                        <input class="name" type="text" name="product" id="txtproduct" placeholder="Informe o produto">
                        <textarea class="message" name="description" id="txtmessage" cols="30" rows="10" placeholder="Descreva sua necessidade"></textarea>
                        <input class="submit-btn" type="button" onclick="sendMail()" value="ENVIAR ORÇAMENTO">
                    </form>
                </div>

            </div>
        </div>
    </div>
</section><!-- end of contact section -->

