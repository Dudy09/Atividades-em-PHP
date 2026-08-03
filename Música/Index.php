<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Minha primeira pagina php</title>
        <link rel="stylesheet" href="style.css">
        <style>
            p{
                /*font-family: Arial, Helvetica, sans-serif;*/
                font-family: Helvetica, Bebas Neue, Big Noodle Titling e Montserrat;
                font-size: 20px;
            }

            .letra{
                margin-left: 200px;
                line-height: 1.5;
            }

        </style>
    </head>
    <body>
    <?php
    echo "<div class='container'>";

        echo "<header class='topo'>";
            echo "<div style='display: flex; align-items: center; margin-top: -10px;'>";
                echo"<input type='button' value='☰' id ='Mais' class='botão_mais'>";    
                echo "<p style='margin-left: 20px;'>Minha letra :)</p>";
                echo "<input type='text' id='nome' style=' justifiy-content: center; align-items: center; border-radius: 10px; background-color: #545454; border: none; width: 500px; height: 30px; margin-left: 50px; padding-left: 10px;' placeholder='Pesquisar...''>";
                echo"<input type='button' value='Conta' id ='Conta' class='Conta_Conta'>";  
            echo "</div>";
        echo "</header>";

        echo "<main style='margin-top: 50px; height: auto'>";
            echo "<article>";
                echo "<header style='background-color: #28282833; height: 100px;' max-height: 100px;'>";
                    echo "<div>";
                        echo "<div>";    
                            echo "<img src='./img/YL(tv).jpg' style='width: 50px; height: 50px; border-radius: 100%; float: left; margin-top: 20px; margin-left: 200px;'>";
                        echo "</div>";
                        echo "<div style='display: flex;' alt='Titulo'>";
                            echo "<p style='margin-left: 20px;'> Flores de outro carnaval<br><a href='1'> YUN LI - </a> <a href='2'> Bittersweet Memories </a> </p>";
                            echo "<div style='display: flex; align-items: center; margin-left: 40em;'>";
                                echo "<p> Discografia </p>";
                                echo "<p style='margin-left: 3em;'> Biografia </p>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</header>";

                echo "<aside style=' width: 300px; height: 1000px; float: left;'>
                
                    <div style='margin-top: 80px; padding-left: 20px;'>
                        <p style='font-weight: bold;'>Siga-nos nas redes sociais</p>
                        <div style='display: flex; flex-direction: column; gap: 10px; margin-top: 15px;'>
                            <a href='#' style='text-decoration: none; color: white; font-size: 14px;'>📷 Instagram</a>
                            <a href='#' style='text-decoration: none; color: white; font-size: 14px;'>🐦 Twitter / X</a>
                            <a href='#' style='text-decoration: none; color: white; font-size: 14px;'>📘 Facebook</a>
                            <a href='#' style='text-decoration: none; color: white; font-size: 14px;'>🎥 TikTok</a>
                            <a href='#' style='text-decoration: none; color: white; font-size: 14px;'>📺 YouTube</a>
                        </div>
                    </div>

                    
                </aside>";

                echo "<aside style=' width: 500px; height: 1000px; float: right;'>
                    <p style='text-align: center; margin-top: 80px;'> </p>

                    <iframe width='450' height='250' src='https://www.youtube.com/embed/tR-m63k2nNM?si=t7a0rkebW6CgdKO0' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' referrerpolicy='strict-origin-when-cross-origin' allowfullscreen></iframe>

                    <div class='card' style='margin-top: 100px;'>
                        <div class='titulo'>
                            <p style='margin-left: 20px'>☰    Do mesmo álbum</p>
                        </div>
                        <div class='lista'>
                            <div class='musica'>
                                <span class='numero'>1</span>
                                <img src='./img/BM.jpg'>
                                <div>
                                    <p class='nome'>Saúde</p>
                                    <span class='artista'>Yun Li</span>
                                </div>
                            </div>

                            <div class='musica'>
                                <span class='numero'>2</span>
                                <img src='./img/BM.jpg'>
                                <div>
                                    <p class='nome'>O filho pródigo</p>
                                    <span class='artista'>Yun Li</span>
                                </div>
                            </div>

                            <div class='musica'>
                                <span class='numero'>3</span>
                                <img src='./img/BM.jpg'>
                                <div>
                                    <p class='nome'>Let it Pour</p>
                                    <span class='artista'>Yun Li</span>
                                </div>
                            </div>

                            <div class='musica'>
                                <span class='numero'>4</span>
                                <img src='./img/BM.jpg'>
                                <div>
                                    <p class='nome'>The story</p>
                                    <span class='artista'>Yun Li</span>
                                </div>
                            </div>

                            <div class='musica'>
                                <span class='numero'>5</span>
                                <img src='./img/BM.jpg'>
                                <div>
                                    <p class='nome'>Back home</p>
                                    <span class='artista'>Yun Li</span>
                                </div>
                            </div>

                            <div class='musica'>
                                <span class='numero'>6</span>
                                <img src='./img/BM.jpg'>
                                <div>
                                    <p class='nome'>Melhor</p>
                                    <span class='artista'>Yun Li</span>
                                </div>
                            </div>

                            <div class='musica'>
                                <span class='numero'>7</span>
                                <img src='./img/BM.jpg'>
                                <div>
                                    <p class='nome'>Oldschool</p>
                                    <span class='artista'>Yun Li</span>
                                </div>
                            </div>

                            <div class='musica'>
                                <span class='numero'>8</span>
                                <img src='./img/BM.jpg'>
                                <div>
                                    <p class='nome'>Dirty dancing</p>
                                    <span class='artista'>Yun Li</span>
                                </div>
                            </div>

                            <div class='musica'>
                                <span class='numero'>9</span>
                                <img src='./img/BM.jpg'>
                                <div>
                                    <p class='nome'>Prefiro morrer</p>
                                    <span class='artista'>Yun Li</span>
                                </div>
                            </div>

                            <div class='musica'>
                                <span class='numero'>10</span>
                                <img src='./img/BM.jpg'>
                                <div>
                                    <p class='nome'>Quase Perfeito</p>
                                    <span class='artista'>Yun Li</span>
                                </div>
                            </div>

                            <div class='musica'>
                                <span class='numero'>11</span>
                                <img src='./img/BM.jpg'>
                                <div>
                                    <p class='nome'>Máquina do tempo</p>
                                    <span class='artista'>Yun Li</span>
                                </div>
                            </div>

                            <div class='musica'>
                                <span class='numero'>12</span>
                                <img src='./img/BM.jpg'>
                                <div>
                                    <p class='nome'>Flores de outro Carnaval</p>
                                    <span class='artista'>Yun Li</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </aside>";

                echo "<div class='letra' style='height: 1000px; width: 735px; margin-left: 300px;'>";
                echo "<div style='display: flex;'>";
                    echo"<input type='button' value='Letras' id ='Mais' class='letras'>";
                    echo"<input type='button' value='Tradução' id ='Mais' class='letras'>";
                echo "</div>";
                echo "<div class='lista_musica'>";
                    echo "<p> Meu herói pro céu se vai <br>
                    Flores de outro carnaval <br>
                    Nunca vou te esquecer, isso eu sei te dizer <br>
                    E quem lembrar de ti <br>
                    Saiba ainda vai sorrir de montão <br>
                    São dores de outro verão (eu não te esqueço não) </p>";

                    echo "<p> E eu dedico um pedacinho desse meu verão <br>
                    Pro meu amigão <br>
                    Pro meu amigão (nunca vou te esquecer, isso eu sei te dizer) <br>
                    Saiba até na morte eu vou dizer <br>
                    Que eu ainda amo você demais <br>
                    E não volto atrás não <br>
                    Eu sou seu amigão </p>";

                    echo "<p> Reach for the sky <br>
                    Know you can fly <br>
                    'Cause all of my friends have wings in their backs <br>
                    I know <br>
                    You are my home </p>";

                    echo "<p> Reach for the sky <br>
                    Know you can fly <br>
                    'Cause all of my friends have wings in their backs <br>
                    I know <br>
                    You are my home </p>";

                    echo "<p> (Yeah) <br>
                    Isso é uma injustiça <br>
                    Deus não leva minha família <br>
                    Me devolve todo mundo <br>
                    Que eu te devo a minha vida <br>
                    Já quis ser vampiro <br>
                    Mas não desejo mais isso <br>
                    Porque não é divertido <br>
                    Viver pra ver meus amigos indo <br>
                    (Oh, oh) </p>";

                    echo "<p> Te prometo que eu vou <br>
                    Te encontrar no pós show </p>";

                    echo "<p> They call it sad <br>
                    I call it evenings <br>
                    They just forget <br>
                    But I keep dreaming <br>
                    They say you dead <br>
                    I say you sleeping <br>
                    They call me mad <br>
                    But I don't see it </p>";

                    echo "<p> Porque essa dor me consome <br>
                    Conhece meu nome <br>
                    E sabe muito bem <br>
                    Que eu busco quem <br>
                    Não vai retornar </p>";

                    echo "<p> Me desculpa por não estar <br>
                    Quando cê mais precisou <br>
                    Acho que cê não falou <br>
                    Ou eu não percebi <br>
                    E não dá pra saber <br>
                    Quando a noite vai chegar <br>
                    E você vai abandonar <br>
                    A terra e subir </p>";

                    echo "<p> E eu dedico um pedacinho desse meu verão <br>
                    Pro meu amigão <br>
                    Pro meu amigão (nunca vou te esquecer, isso eu sei te dizer) <br>
                    Saiba até na morte eu vou dizer <br>
                    Que eu ainda amo você demais <br>
                    E não volto atrás não <br>
                    Eu sou seu amigão </p>";
                echo "</div>";
                echo "</div>";
            echo "</article>";
        echo"<p class='sub_titulo'> Composição: Yun Li / Biffe / Hakuro. </p>";
        echo "<br>";
        echo "</main>"; //#517191
        
        echo"<hr>";

        echo "<footer class='baixo'>";  
        echo "<div>";
            echo "<h2 style='margin-left: 300px; margin-top: 50px'>Mais ouvidas de YUNG LIXO (yun li) </h2>";
        echo "</div>";
        echo "<div style='display: flex; align-items: center; justify-content: center;'>";
                echo"<ol class='lista-musicas'>";
                    echo"<li id='especial'>Tomodachi (feat. Sho-sensei)</li>";
                    echo"<li class='teste'>Máquina do Tempo</li>";
                    echo"<li class='teste'>Primavera</li>";
                    echo"<li class='teste'>Dirty Dancing</li>";
                    echo"<li class='teste'>Joias da Família</li>";
                    echo"<li class='teste'>Lost in Translation</li>";
                    echo"<li class='teste'>Deixa Doer</li>";
                    echo"<li class='teste'>Memórias</li>";
                    echo"<li class='teste'>Sombra</li>";
                    echo"<li class='teste'>Anjos da Guarda</li>";
                    echo"<li class='teste'>Transparência (feat. Hakuro)</li>";
                    echo"<li class='teste'>Melhor Não</li>";
                    echo"<li class='teste'>Sonhar</li>";
                    echo"<li id='teste2'>Não Me Faça Falar (part. Biffe e Hakuro)</li>";
                    echo"<li class='teste'>O Filho Pródigo</li>";
                    echo"<li class='teste'>Polaroid</li>";
                    echo"<li class='teste'>Prefiro Morrer</li>";
                    echo"<li class='teste'>Sakura</li>";
                    echo"<li class='teste'>We Gold</li>";
                    echo"<li class='teste'>i walk (part. Massaru)</li>";
                echo"</ol>";
            echo"</div>";
            echo"<hr>";
            echo"<main style='display: flex; justify-content: center; align-items: center;'>";

                echo"<article class='cartão' style='margin-right: 30px;'>";
                    echo"<p style='font-size: 16px;'>Músicas<br></p>";
                    echo"<p class='sub_titulo'>Top músicas<br></p>";
                    echo"<p class='sub_titulo'>Top artistas<br></p>";
                    echo"<p class='sub_titulo'>Top álbuns<br></p>";
                    echo"<p class='sub_titulo'>Atualizações<br></p>";
                    echo"<p class='sub_titulo'>Lançamentos<br></p>";
                    echo"<p class='sub_titulo'>Playlists do Letras</p>";
                echo"</article>";

                echo"<article class='cartão' style='margin-right: 30px;'>";                             
                    echo"<p style='font-size: 16px;'>Participe<br></p>";
                    echo"<p class='sub_titulo';'>Crie seu perfil musical<br></p>";
                    echo"<p class='sub_titulo';'>Envie álbuns<br></p>";
                    echo"<p class='sub_titulo';'>Envie letras<br></p>";
                    echo"<p class='sub_titulo';'>Correções de letras<br></p>";
                    echo"<p class='sub_titulo';'>Assine o Letras<br></p>";
                echo"</article>";

                echo"<article class='cartão'>";
                    echo"<p style='font-size: 16px;'>Sobre o site<br></p>";
                    echo"<p class='sub_titulo'>Ajuda<br></p>";
                    echo"<p class='sub_titulo'>Termos de uso e privacidade<br></p>";
                    echo"<p class='sub_titulo'>Sobre o Letras<br></p>";
                    echo"<p class='sub_titulo'>Trabalhe no Letras<br></p>";
                    echo"<p class='sub_titulo'>Padrões para envios<br></p>";        
                echo"</article>";

                echo"<article class='cartão' style='margin-left: 30px;'>";
                    echo"<p style='font-size: 16px;'>Nosso site<br></p>";
                    echo"<p class='sub_titulo'>Página inicial<br></p>";
                    echo"<p class='sub_titulo'>Lista de estilos<br></p>";
                    echo"<p class='sub_titulo'>Enviar nova letra<br></p>";     
                echo"</article>";
            echo"</main>";
            echo"<hr style='margin-top: 50px;'>";
            echo"<footer class='footer'>";
                echo"<main class='footer_main'>";
                    echo"<form style='max-width: 500px;'>";
                        echo"<h3>Entre em contato comigo</h3>";
                        echo"<div>";
                            echo"<label for='nome'>Nome:</label>";
                            echo"<input type='text' id='nome' name='nome' placeholder='Digite seu nome'>";
                        echo"</div>";

                        echo"<div>";
                            echo"<label for='email'>Email:</label>";
                            echo"<input type='email' id='email' name='email' placeholder='seu.email@exemplo.com'>";
                        echo"</div>";

                        echo"<div>";
                            echo"<label for='assunto'>Assunto:</label>";
                            echo"<input type='text' id='assunto' name='assunto' placeholder='Assunto da mensagem'>";
                        echo"</div>";

                        echo"<div>";
                            echo"<label for='mensagem'>Mensagem:</label>";
                            echo"<textarea id='mensagem' name='mensagem' placeholder='Digite sua mensagem aqui...' rows='5'></textarea>";
                        echo"</div>";

                        echo"<button type='submit'>Enviar Mensagem</button>";
                    echo"</form>";
                echo"</main>";
            echo"</footer>";
            echo"<p style='text-align: center; font-size: 14px; color: #ccc;'>© 2026 Todos os direitos reservados de sites de letras por Arthur De Gois Carramão Almeida. R.M:250533</p>";
        echo"</footer>";
    echo"</div>";
        ?>
    </body>
</html>