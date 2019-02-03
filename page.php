<!DOCTYPE html>
<html>

    <body>
  <header>
    <h1>Mon Blogue</h1>
  </header>
  <article>
    <h1>Mon billet de mon blogue</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
    eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    <aside>
      <!—Vu que ce aside est à l’intérieur de la balise article, l’analyseur syntaxique va comprendre que le contenu de la balise est directement relié à l’article lui-même. -->
      <h1>Glossaire</h1>
      <dl>
        <dt>Lorem</dt>
        <dd>ipsum dolor sit amet</dd>
      </dl>
    </aside>
  </article>
  <aside>
    <!—Ce aside est en dehors de la balise article. Son contenu est relié à la page, mais pas autant que la balise aside à l’intérieur de la balise article. -->
    <h2>Mes liens préférés</h2>
    <ul>
      <li><a href="#">Mon ami</a></li>
      <li><a href="#">Mon autre ami</a></li>
      <li><a href="#">Mon meilleur ami</a></li>
    </ul>
  </aside>
</body>

</html>