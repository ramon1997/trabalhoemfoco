<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho em foco</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="imagens/tools.png" type="image/x-icon">

    <!--script do carrosel-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script src="javascript/banner_central.js" type="text/javascript"></script>
    <script type="text/javascript">
		
		var firstbgcarousel=new bgCarousel({
			wrapperid: 'bannercentral',
			imagearray: [
				['imagens/1.jpg'],
				['imagens/2.jpg'],
				['imagens/3.jpg'],
				['imagens/4.jpg']
			],
			//config slide
			displaymode: {type:'auto', pause:3000, cycle:32, stoponclick:false, pauseonmouseover:true},
			navbuttons: ['imagens/seta_esquerda.jpg','imagens/seta_direita.jpg',],
			activeslideclass: 'selectedslide',
			orientation: 'h',
			persist: true, // lembrar do ultimo slide visualizado e recuperar na mesma sesao
			slideduration: 500,
		})
	</script>
	<script src="Script/swfobject_modified.js" type="text/javascript"></script>
	<script type="text/javascript">
		function randomizeContent(classname){
			var contents=randomizeContent.collectElementbyClass(classname)
			contents.text.sort(function() {return 0.5 - Math.random();})
			var tbodyref=contents.ref[0].tagName=="TR"? contents.ref[0].parentNode : new Object()
			for (var i=0; i<contents.ref.length; i++){
				if (tbodyref.moveRow) //if IE
				tbodyref.moveRow(0, Math.round(Math.random()*(tbodyref.rows.length-1)))
				else 
				contents.ref[i].innerHTML=contents.text[i]
				contents.ref[i].style.visibility="visible"
			}
		}

		randomizeContent.collectElementbyClass=function(classname){
			var classnameRE=new RegExp("(^|\\s+)"+classname+"($|\\s+)", "i")
			var contentobj=new Object()
			contentobj.ref=new Array()
			contentobj.text=new Array()
			var alltags=document.all ? document.all : document.getElementsByTagName("*")
			for (var i=0; i<alltags.length; i++){
				if (typeof alltags[i].className=="string" && alltags[i].className.search(classnameRE)!=-1){
					contentobj.ref[contentobj.ref.length]=alltags[i]
					contentobj.text[contentobj.text.length]=alltags[i].innerHTML
				}
			}
			return contentobj
		}
	</script>
    <!--fim do script-->
</head>

<body>
    <div class="barra">
        <div class="logo">
            <img src="imagens/tools.png">
            <h1>Trabalho em foco</h1>
        </div>
        <nav class="barra">
            <div class="mobile">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="vagas.php">Vagas</a></li>
                <li><a href="#contatos">Contatos</a></li>
                <li><a href="#quemsomos">Quem Somos</a></li>

            </ul>
        </nav>
    </div>
    <div id="bannercentral" class="banner">
    </div>
    <div class="meio">
        <h1>"Nunca é tarde demais para ser quem você poderia ter sido." - George Eliot</h1>
    </div>
    <div class="contatos">
        <div class="card">
            <img src="imagens/email.png">
            <h2>trabalhoemfoco@gmail.com</h2>
        </div>
        <div class="card">
            <img src="imagens/insta.png">
            <h2>@trabalhoemfoco</h2>
        </div>
        <div class="card">
            <img src="imagens/zap.png">
            <h2>(75)99999999</h2>
        </div>
    </div>
    <div class="quem">
        <h1>Quem somos</h1>
        <p>"Trabalho em foco o seu parceiro confiável na busca por oportunidades de carreira e
            no recrutamento de talentos. Nossa plataforma foi projetada para simplificar o processo de encontrar
            empregos ou candidatos ideais. Com uma vasta gama de ofertas de emprego e uma base de dados robusta de
            currículos, conectamos candidatos talentosos a empresas de renome em todo o país.

            Para os candidatos, oferecemos uma experiência fácil de usar, com pesquisa intuitiva, notificações
            personalizadas e ferramentas para criar perfis atraentes. Para os empregadores, fornecemos um espaço para
            publicar vagas, analisar currículos e gerenciar o processo de recrutamento de forma eficiente.

            Independentemente de você estar em busca de um novo desafio profissional ou procurando o candidato perfeito
            para sua empresa, Trabalho em foco é o seu destino de escolha. Junte-se a nós e leve sua carreira
            ou seu negócio para o próximo nível."</p>
    </div>
    <footer>
        <p>Copyright © 2023 Antony Dias & Ramon Santana. All right reserved</p>
    </footer>
    <script src="javascript/js.js"></script>
</body>

</html>