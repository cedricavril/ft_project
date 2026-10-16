<!-- 
$total
$filters


$offresData['resultats'] contient:
  $offre['typeContrat']
  $offre['intitule'];
  $offre['contact']['nom'];
  $offre['lieuTravail']['libelle'];
  $offre['typeContrat']
  $offre['dureeTravailLibelle']
  $offre['description'];
  $offre['id']
 -->


<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Vous avez reçu <?= $total; ?> nouvelles offres selon vos critères de recherche</title>
    <!--[if !mso]><!-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">#outlook a { padding: 0; }body { margin: 0; padding: 0; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }table, td { border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }p { display: block; margin: 13px 0; }</style>
    <!--[if mso]> <noscript> <xml> <o:OfficeDocumentSettings> <o:AllowPNG/> <o:PixelsPerInch>96</o:PixelsPerInch> </o:OfficeDocumentSettings> </xml> </noscript><![endif]--><!--[if lte mso 11]> <style type="text/css"> .mj-outlook-group-fix { width: 100% !important; } </style><![endif]--><!--[if !mso]><!-->
    <link
      href="https://cdn.francetravail.fr/studio/mailing/css/fonts.css"
      rel="stylesheet" type="text/css">
    <style type="text/css"></style><!--<![endif]-->
    <style type="text/css">
.info-important {
    font-weight: bold;
    font-family: courier;
    font-size: larger;
    color: goldenrod;
}
    </style>
    <style media="screen and (min-width:480px)">.moz-text-html .mj-column-per-100 { width: 100% !important; max-width: 100%; }.moz-text-html .mj-column-per-50 { width: 50% !important; max-width: 50%; }.moz-text-html .mj-column-per-45 { width: 45% !important; max-width: 45%; }.moz-text-html .mj-column-per-55 { width: 55% !important; max-width: 55%; }</style>
    <style type="text/css"></style>
    <style type="text/css">a { color: #283276; text-decoration: underline; text-decoration-offset: 2px; }p { font-family: system-ui, sans-serif; margin: 0 0 22px 0; }.app-icon img { border-radius: 4px; border-color: #CDCFD8; border-width: 1px; border-style: solid; }</style>
  </head>
  <body style="word-spacing:normal;background-color:#ffffff;">
    <!-- Attention : ce code dans la balise img sert pour la mise en place d'un pixel pour remonter de la donnée statistique sur Piano. Il ne fait pas partie du template du mail, alors en cas de nouvelle version du template, bien s'assurer de ne pas perdre cette balise.-->
    <img
src="https://hd.pe.fr/event?s=475540&amp;events=%5B%7B%22name%22%3A%22email.display.offsite%22%2C%22data%22%3A%7B%22src_medium%22%3A%22CMP%22%2C%22src_campaign%22%3A%22DSI%22%2C%22src_cmp_indicateur1%22%3A%22AbonnementOffres%22%2C%22src_cmp_indicateur2%22%3A%22mail%22%2C%22src_cmp_indicateur3%22%3A%22nouvelleOffre%22%7D%7D%5D"
      width="1" height="1" style="display:none;" alt=""
      moz-do-not-send="true">
    <div style="background-color:#ffffff;" lang="fr" dir="ltr"><!--[if mso | IE]> <table align="center" border="0" cellpadding="0" cellspacing="0" class="" role="presentation" style="width:600px;" width="600" bgcolor="#ffffff"> <tr> <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
      <div
style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0"
          role="presentation"
style="background:#ffffff;background-color:#ffffff;width:100%;">
          <tbody>
            <tr>
              <td
style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-top:0;text-align:center;"><!--[if mso | IE]> <table role="presentation" border="0" cellpadding="0" cellspacing="0"> <tr> <td class="" style="vertical-align:top;width:600px;"><![endif]-->
                <div class="mj-column-per-100 mj-outlook-group-fix"
style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><span
style="display:inline-block; max-height:0; max-width:0;mso-font-width:0%;mso-style-textfill-type: none; white-space: nowrap;"><span
                      role="heading" aria-level="1"
style="max-height:1px; max-width:1px; display:inline-block; overflow:hidden; font-size:1px;color:rgba(0,0,0,0);text-indent:9px;">France
                      travail</span></span>
                  <table border="0" cellpadding="0" cellspacing="0"
                    role="presentation" style="vertical-align:top;"
                    width="100%">
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <!--[if mso | IE]></td></tr></table><![endif]--></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--[if mso | IE]></td></tr></table> <table align="center" border="0" cellpadding="0" cellspacing="0" class="" role="presentation" style="width:600px;" width="600" bgcolor="#ffffff"> <tr> <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
      <div
style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0"
          role="presentation"
style="background:#ffffff;background-color:#ffffff;width:100%;">
          <tbody>
            <tr>
              <td
style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-top:0;text-align:center;"><!--[if mso | IE]> <table role="presentation" border="0" cellpadding="0" cellspacing="0"> <tr> <td class="" style="vertical-align:top;width:600px;"><![endif]-->
                <div class="mj-column-per-100 mj-outlook-group-fix"
style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                  <table border="0" cellpadding="0" cellspacing="0"
                    role="presentation" width="100%">
                    <tbody>
                      <tr>
                        <td style="vertical-align:top;padding:0px;">
                          <table border="0" cellpadding="0"
                            cellspacing="0" role="presentation" style=""
                            width="100%">
                            <tbody>
                              <tr>
                                <td align="center"
style="font-size:0px;padding:0px;word-break:break-word;">
                                  <table border="0" cellpadding="0"
                                    cellspacing="0" role="presentation"
style="border-collapse:collapse;border-spacing:0px;">
                                    <tbody>
                                      <tr>
                                        <td style="width:600px;"><a
href="https://www.francetravail.fr/accueil/?at_medium=CMP&amp;at_campaign=DSI&amp;at_cmp_indicateur1=AbonnementOffres&amp;at_cmp_indicateur2=mail&amp;at_cmp_indicateur3=nouvelleOffre"
                                            target="_blank"
title="Accéder à France Travail" moz-do-not-send="true"><img
alt="République Française, Liberté, égalité, Fraternité. France Travail"
src="https://cdn.francetravail.fr/studio/mailing/header-FT.png"
style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:16px;"
title="Accéder à France Travail" width="600" height="auto"
                                              moz-do-not-send="true"></a></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if mso | IE]></td></tr></table><![endif]--></td>
            </tr>
          </tbody>
        </table>
      </div>

<div style="margin:0px auto;max-width:600px;"> <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;"> <tbody> <tr> <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-top:20px;text-align:center;"> <!--[if mso | IE]> <table role="presentation" border="0" cellpadding="0" cellspacing="0"> <tr> <td class="" style="vertical-align:top;width:600px;"><![endif]--> <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"> <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"> <tbody> <tr> <td align="left" style="font-size:0px;padding:0px 24px;padding-bottom:8px;word-break:break-word;"> <div style="font-family:Marianne, system-ui, sans-serif;font-size:16px;font-weight:500;line-height:22px;text-align:left;color:#414042;"> <h3>Rappel de vos critères&nbsp;:</h3></div> </td> </tr> </tbody> </table> </div> <!--[if mso | IE]></td></tr></table><![endif]--></td> </tr> </tbody> </table> </div>



<div style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;"> <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%;"> <tbody> <tr> <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-top:0px;text-align:center;"> <!--[if mso | IE]> <table role="presentation" border="0" cellpadding="0" cellspacing="0"> <tr> <td class="" style="vertical-align:top;width:555px;"><![endif]--> <div class="mj-column-per-92-5 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"> 

<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="background-color:#F5F5F8;border-radius:8px;vertical-align:top;" width="100%"> 
  <tbody> 
    <tr> 
      <td align="left" style="font-size:0px;padding:20px;word-break:break-word;"> 
        <div style="font-family:system-ui, sans-serif;font-size:16px;font-weight:400;line-height:22px;text-align:left;color:#2e2e31;"> 
<?php 

foreach ($filters as $key => $value) {
  if ($value) {
    if ($key == 'departement') $key = 'Département';
    if ($key == 'romeInput') continue;
    if ($key == 'codeROME') {
      $key =  'Code ROME';
      $value = $filters['romeInput'];
    }
    if ($key == 'contrat') continue;
    if ($key == 'typeContrat') $key = 'Type de contrat';
    if ($key == 'motsCles') $key = 'Mots clés';
    $key = ' - ' . $key;
?>
          <p style="margin-bottom:8px"><?= $key ?> &nbsp;: 
            <span style="font-weight:700"><?= $value ?></span> 
          </p>   
<?php  
  }
}
?>
        </div> 
      </td> 
    </tr> 
  </tbody> 
</table> 

</div> <!--[if mso | IE]></td></tr></table><![endif]--></td> </tr> </tbody> </table> </div>

      <!--[if mso | IE]></td></tr></table><![endif]--><!-- section contenu Offre transmise --><!--[if mso | IE]> <table align="center" border="0" cellpadding="0" cellspacing="0" class="" role="presentation" style="width:600px;" width="600" bgcolor="#ffffff"> <tr> <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
      <div
style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0"
          role="presentation"
style="background:#ffffff;background-color:#ffffff;width:100%;">
          <tbody>
            <tr>
              <td
style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:20px;padding-top:20px;text-align:center;"><!--[if mso | IE]> <table role="presentation" border="0" cellpadding="0" cellspacing="0"> <tr> <td class="" style="vertical-align:top;width:600px;"><![endif]-->
                <div class="mj-column-per-100 mj-outlook-group-fix"
style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                  <table border="0" cellpadding="0" cellspacing="0"
                    role="presentation" style="vertical-align:top;"
                    width="100%">
                    <tbody>
                      <tr>
                        <td align="left"
style="font-size:0px;padding:0px 24px;word-break:break-word;">
                          <div
style="font-family:system-ui, sans-serif;font-size:16px;font-weight:400;line-height:22px;text-align:left;color:#2e2e31;">
                            <p>Bonjour,</p>
                            <p><span style="font-weight:700"> <?= $total ?>
                                offre(s) partagée(s) depuis France Trouvaille. </span></p>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if mso | IE]></td></tr></table><![endif]--></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--[if mso | IE]></td></tr></table><![endif]--><!-- start block -->
      <table align="center" width="552"
style="border-spacing:0;margin:0 auto;padding:0;width:90%;max-width:552px;"
        role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tbody>
<?php 
$i = 0;
foreach ($resultats as $offre) {
    $i++;
    if ($offre['typeContrat'] == 'MIS') $offre['typeContrat'] = 'Intérim (MIS)';
    if ($total_newOffers >= $i) echo '<tr><td></td><td class=\'info-important\'>&#11088; Nouvelle offre</td></tr>';
?>
            <tr>
            <td width="12%" style="width:72px;"><!-- logo offre --><img
                align="left" alt="" width="64" height="64"
style="width:64px; max-width:64px;display: inline-block;padding:0px 0px 8px 0px"
src="https://cdn.francetravail.fr/studio/logos/marque/Logo_France_Travail_RVB_Vertical_Coul_Positif_Carre_80.png"
                moz-do-not-send="true"> </td>
            <td>

              <!-- titre offre --><a
href="https://candidat.francetravail.fr/offres/recherche/detail/<?= $offre['id'] ?>?at_medium=CMP&amp;at_campaign=DSI&amp;at_cmp_indicateur1=AbonnementOffres&amp;at_cmp_indicateur2=mail&amp;at_cmp_indicateur3=nouvelleOffre"
style="text-decoration:none;color:#283276; display: inline-block; margin-bottom: 8px;"
                moz-do-not-send="true"><span
style="display: inline-block;font-size:20px;font-weight:700;font-family:Marianne, Verdana, system-ui;line-height: 1.3;"><?=$offre['intitule'];?><br>
                  <!-- Provenance --> <span
style="font-size:16px; font-weight: 500; font-family:Marianne, Verdana, system-ui; line-height: 1.5; color: #2E2E31;"><?=$offre['contact']['nom'];?><br>
                    </span> 
                  <!-- Lieu offre --> <span
style="font-size:16px; font-weight: 500;font-family:Marianne, Verdana, system-ui; line-height: 1.5; color: #5B5D65;"><?=$offre['lieuTravail']['libelle'];?></span></span></a> </td>
          </tr>
          <!-- icones caracteristiques --> <tr>
            <td colspan="2"><!--[if mso]> <table cellspacing="8" cellpadding="4" border-collapse="separate" style="border-collapse:separate;"> <![endif]--><!--[if !mso]><!----->
              <table cellspacing="4" border-collapse="separate"
                style="border-collapse:separate;">
                <!--[endif]----> <tbody>
                  <tr>
                    <td><img
src="https://cdn.francetravail.fr/studio/mailing/icon-sm-edit.png"
                        alt="" width="16" height="16"
                        moz-do-not-send="true"></td>
                    <td><span
style="font-family: system-ui, sans-serif; margin-bottom:8px; line-height: 1.35;"><?php echo $offre['typeContrat'] ?? 'n/a';?></span>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!--[if mso]> <table cellspacing="8" cellpadding="4" border-collapse="separate" style="border-collapse:separate;"> <![endif]--><!--[if !mso]><!---->
              <table cellspacing="4" border-collapse="separate"
                style="border-collapse:separate;">
                <!--[endif]----> <tbody>
                  <tr>
                    <td><img
src="https://cdn.francetravail.fr/studio/mailing/icon-sm-clock.png"
                        alt="" width="16" height="16"
                        moz-do-not-send="true"></td>
                    <td><span
style="font-family: system-ui, sans-serif; margin-bottom:8px; line-height: 1.35;"><?php echo $offre['dureeTravailLibelle'] ?? 'n/a';?></span> </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <!-- icones caracteristiques --> <tr>
            <td colspan="2">
              <p style="margin-top:8px;line-height:1.2;"><?php 
/*display the first 250 cars*/
$desc = $offre['description'];
if (strlen($desc) > 250) $desc = substr($desc, 0, 250) . '...';
echo $desc, PHP_EOL; 
            ?></p>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <p
style="margin-bottom: 16px; color:#5B5D65;padding-bottom:0px;">Offre
                n°<?=$offre['id'];?></p>
              <!-- <mj-divider border-width="1px" border-color="#e6e7ec" padding="12px 20px" /> --></td>
          </tr>
          <tr>
            <td colspan="2">
              <hr
style="border-width: 0; background: #e6e7ec; color: #e6e7ec; height:1px; margin-bottom: 12px;">
            </td>
          </tr>

<?php 
  $i++;
} // For end ?>


        </tbody>
      </table>
      <!-- end block --><!-- CTA --><!--[if mso | IE]> <table align="center" border="0" cellpadding="0" cellspacing="0" class="" role="presentation" style="width:600px;" width="600"> <tr> <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
      <div style="margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0"
          role="presentation" style="width:100%;">
          <tbody>
            <tr>
              <td
style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;"><!--[if mso | IE]> <table role="presentation" border="0" cellpadding="0" cellspacing="0"> <tr> <td class="" width="600px"> <table align="center" border="0" cellpadding="0" cellspacing="0" class="" role="presentation" style="width:600px;" width="600"> <tr> <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                <div style="margin:0px auto;max-width:600px;">
                  <table align="center" border="0" cellpadding="0"
                    cellspacing="0" role="presentation"
                    style="width:100%;">
                    <tbody>
                      <tr>
                        <td
style="direction:ltr;font-size:0px;padding-top:0px;text-align:center;"><!--[if mso | IE]> <table role="presentation" border="0" cellpadding="0" cellspacing="0"> <tr> <td class="" style="vertical-align:top;width:300px;"><![endif]-->
                          <div
class="mj-column-per-50 mj-outlook-group-fix"
style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                            <div
                              style="text-align:center; margin-top: 0;">
                              <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://candidat.francetravail.fr/offres/recherche?at_medium=CMP&at_campaign=DSI&at_cmp_indicateur1=AbonnementOffres&at_cmp_indicateur2=mail&at_cmp_indicateur3=nouvelleOffre&offresPartenaires=true&motsCles=d%C3%A9veloppeur+web" style="height:36px;v-text-anchor:middle;width:160px;margin-bottom:0px" arcsize="30%" strokeweight="1px" strokecolor="#2E2E31" fillcolor="#FFFFFF"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#2E2E31; font-family:sans-serif; font-size:16px; font-weight:500;"> Voir plus d&#39;offres </center></v:textbox><![endif]-->
                              <!--[if !mso]><!----><a
href="https://francetrouvaille.naytheet.fr"
style="background-color:#ffffff;border-radius:12px;color:#2E2E31;border:1px solid #2E2E31;display:inline-block;margin-bottom:12px;padding-top:8px;padding-bottom:8px;padding-right:16px;padding-left:16px;font-family:sans-serif;font-size:16px;font-weight:500;text-align:center;text-decoration:none;width:120px;-webkit-text-size-adjust:none;"
                                moz-do-not-send="true">Voir plus
                                d'offres</a><!--[endif]----><!--[if mso]></v:roundrect><![endif]--></div>
                            <table border="0" cellpadding="0"
                              cellspacing="0" role="presentation"
                              style="vertical-align:top;" width="100%">
                              <tbody>
                              </tbody>
                            </table>
                          </div>
                          <!--[if mso | IE]></td> <td class="" style="vertical-align:top;width:300px;"><![endif]-->

                          <!--[if mso | IE]></td></tr></table><![endif]--></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if mso | IE]></td></tr></table></td></tr></table><![endif]--></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--[if mso | IE]></td></tr></table><![endif]--><!-- end CTA --><!--[if mso | IE]> <table align="center" border="0" cellpadding="0" cellspacing="0" class="" role="presentation" style="width:600px;" width="600" bgcolor="#ffffff"> <tr> <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
      <div
style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0"
          role="presentation"
style="background:#ffffff;background-color:#ffffff;width:100%;">
          <tbody>
            <tr>
              <td
style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;"><!--[if mso | IE]> <table role="presentation" border="0" cellpadding="0" cellspacing="0"> <tr> <td class="" width="600px"> <table align="center" border="0" cellpadding="0" cellspacing="0" class="" role="presentation" style="width:600px;" width="600" bgcolor="#ffffff"> <tr> <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                <div
style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;">
                  <table align="center" border="0" cellpadding="0"
                    cellspacing="0" role="presentation"
style="background:#ffffff;background-color:#ffffff;width:100%;">
                    <tbody>
                      <tr>
                        <td
style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:20px;padding-top:20px;text-align:center;"><!--[if mso | IE]> <table role="presentation" border="0" cellpadding="0" cellspacing="0"> <tr> <td class="" style="vertical-align:middle;width:600px;"><![endif]-->
                          <div
class="mj-column-per-100 mj-outlook-group-fix"
style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:middle;width:100%;">
                            <table border="0" cellpadding="0"
                              cellspacing="0" role="presentation"
                              width="100%">
                              <tbody>
                                <tr>
                                  <td
style="vertical-align:middle;padding-bottom:0;">
                                    <table border="0" cellpadding="0"
                                      cellspacing="0"
                                      role="presentation" style=""
                                      width="100%">
                                      <tbody>
                                        <tr>
                                          <td align="left"
style="font-size:0px;padding:0px 24px;word-break:break-word;">
                                            <div
style="font-family:system-ui, sans-serif;font-size:16px;font-weight:400;line-height:22px;text-align:left;color:#2e2e31;">
                                              <p>Cordialement,<br>
                                                France Trouvaille</p>
                                            </div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!--[if mso | IE]></td></tr></table><![endif]--></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if mso | IE]></td></tr></table></td></tr><![endif]--><!-- section application mobile --><!--[if mso | IE]> <tr> <td class="" width="600px"> <table align="center" border="0" cellpadding="0" cellspacing="0" class="" role="presentation" style="width:600px;" width="600" bgcolor="#ffffff"> <tr> <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                <div
style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:600px;">
                  <table align="center" border="0" cellpadding="0"
                    cellspacing="0" role="presentation"
style="background:#ffffff;background-color:#ffffff;width:100%;">
                    <tbody>
                      <tr>
                        <td
style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:20px;padding-left:20px;padding-right:20px;padding-top:20px;text-align:center;"><!--[if mso | IE]> <table role="presentation" border="0" cellpadding="0" cellspacing="0"> <tr> <td class="" width="600px"> <table align="center" border="0" cellpadding="0" cellspacing="0" class="" role="presentation" style="width:560px;" width="560" bgcolor="#f5f5f8"> <tr> <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                          <div
style="background:#f5f5f8;background-color:#f5f5f8;margin:0px auto;border-radius:12px;max-width:560px;">
                            <table align="center" border="0"
                              cellpadding="0" cellspacing="0"
                              role="presentation"
style="background:#f5f5f8;background-color:#f5f5f8;width:100%;border-radius:12px;">
                              <tbody>
                                <tr>
                                  <td
style="direction:ltr;font-size:0px;padding:0 12px;text-align:center;"><!--[if mso | IE]> <table role="presentation" border="0" cellpadding="0" cellspacing="0"> <tr> <td class="" style="vertical-align:middle;width:241.2px;"><![endif]-->
                                    <div
class="mj-column-per-45 mj-outlook-group-fix"
style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:middle;width:100%;">
                                      <table border="0" cellpadding="0"
                                        cellspacing="0"
                                        role="presentation" width="100%">
                                        <tbody>
                                          <tr>
                                            <td
style="vertical-align:middle;padding:8px 0px 8px 0px;">
                                              <table border="0"
                                                cellpadding="0"
                                                cellspacing="0"
                                                role="presentation"
                                                style="" width="100%">
                                                <tbody>
                                                  <tr>
                                                    <td align="center"
style="font-size:0px;padding:0px;word-break:break-word;">
                                                      <!--[if mso | IE]> <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"> <tr> <td><![endif]-->
                                                      <table
                                                        align="center"
                                                        border="0"
                                                        cellpadding="0"
                                                        cellspacing="0"
role="presentation" style="float:none;display:inline-table;">
                                                        <tbody>
                                                          <tr
class="app-icon">
                                                          <td
style="padding:0px 4px 0 0;vertical-align:middle;">
                                                          <table
                                                          border="0"
cellpadding="0" cellspacing="0" role="presentation"
style="border-radius:4px;width:40px;">
                                                          <tbody>
                                                          <tr>
                                                          <td
style="padding:0px;font-size:0;height:40px;vertical-align:middle;width:40px;">
                                                          <img alt=""
                                                          height="40"
src="https://cdn.francetravail.fr/studio/logos/mobile/parcours-emploi/parcours-emploi-app.png"
style="border-radius:4px;display:block;" width="40"
moz-do-not-send="true"> </td>
                                                          </tr>
                                                          </tbody>
                                                          </table>
                                                          </td>
                                                          <td
style="vertical-align:middle;padding:0px;"><span
style="color:#2e2e31;font-size:16px;font-weight:400;font-family:system-ui, sans-serif;line-height:22px;text-decoration:none;"><span
style="font-family: Marianne, Verdana, system-ui; padding-left 10px;font-size:14px;line-height: 1.25;text-align:left;display:inline-block;">Télécharger
                                                          l'application
                                                          <br>
                                                          <span
style="font-weight:700;">Parcours Emploi</span></span></span></td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                      <!--[if mso | IE]></td></tr></table><![endif]--></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    <!--[if mso | IE]></td> <td class="" style="vertical-align:middle;width:294.8px;"><![endif]-->
                                    <div
class="mj-column-per-55 mj-outlook-group-fix"
style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:middle;width:100%;">
                                      <table border="0" cellpadding="0"
                                        cellspacing="0"
                                        role="presentation" width="100%">
                                        <tbody>
                                          <tr>
                                            <td
style="vertical-align:middle;padding:8px 0 8px 0;">
                                              <div
style="text-align:center;"><!--[if mso]> <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"> <tr> <td width="126"><![endif]-->
                                                <div
style="display:inline-block;margin-right:8px;margin-top:8px; margin-bottom: 8px;">
                                                  <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://apps.apple.com/fr/app/mes-offres-p%C3%B4le-emploi/id563863597?pt=1432235&ct=mail_abo_offre_francetravail.fr_mail&mt=8" style="display: inline-block;height:40px;v-text-anchor:middle;width:127px;" arcsize="10%" stroke="f" fill="t"><v:fill type="tile" src="https://cdn.francetravail.fr/studio/logos/mobile/app-store-link-white.png" color="#ffffff"/><w:anchorlock/><center style="color:#ffffff;font-family:sans-serif;font-size:0px;"> T&eacute;l&eacute;charger dans l&#39;App Store </center></v:roundrect><![endif]-->
                                                  <!--[if !mso]><!----><a
title="Télécharger dans l'App Store"
href="https://apps.apple.com/fr/app/mes-offres-p%C3%B4le-emploi/id563863597?pt=1432235&amp;ct=mail_abo_offre_francetravail.fr_mail&amp;mt=8"
moz-do-not-send="true"><span
style="display:inline-block; max-height:0; max-width:0;mso-font-width:0%;mso-style-textfill-type: none; white-space: nowrap;"><span
style="max-height:1px; max-width:1px; display:inline-block; overflow:hidden; font-size:1px;color:rgba(0,0,0,0);">Télécharger l'appli FT
                                                        dans l'App Store</span></span><img
src="https://cdn.francetravail.fr/studio/logos/mobile/app-store-link-white.png"
                                                      width="127"
                                                      height="40"
moz-do-not-send="true"></a><!-- <![endif]--></div>
                                                <!--[if mso]></td> <td><![endif]-->
                                                <div
style="display:inline-block;"><!--[if mso]> <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://play.google.com/store/apps/details?id=com.poleemploi.pemobile&referrer=utm_source=francetravail.fr&utm_medium=email&utm_campaign=mail_abo_offre" style="display: inline-block;height:40px;v-text-anchor:middle;width:135px;" arcsize="10%" stroke="f" fill="t"> <v:fill type="tile" src="https://cdn.francetravail.fr/studio/logos/mobile/google-play-link-white.png" color="#ffffff"/> <w:anchorlock/> <center style="color:#ffffff;font-family:sans-serif;font-size:0px;"> Disponible sur Google Play </center> </v:roundrect><![endif]--><!--[if !mso]><!----><a
title="Disponible sur Google Play"
href="https://play.google.com/store/apps/details?id=com.poleemploi.pemobile&amp;referrer=utm_source=francetravail.fr&amp;utm_medium=email&amp;utm_campaign=mail_abo_offre"
moz-do-not-send="true"><span
style="display:inline-block; max-height:0; max-width:0;mso-font-width:0%;mso-style-textfill-type: none; white-space: nowrap;"><span
style="max-height:1px; max-width:1px; display:inline-block; overflow:hidden; font-size:1px;color:rgba(0,0,0,0);">Disponible
                                                        sur Google Play</span></span><img
src="https://cdn.francetravail.fr/studio/logos/mobile/google-play-link-white.png"
                                                      width="135"
                                                      height="40"
moz-do-not-send="true"></a><!-- <![endif]--></div>
                                                <!--[if mso]></td></tr></table><![endif]--></div>
                                              <table border="0"
                                                cellpadding="0"
                                                cellspacing="0"
                                                role="presentation"
                                                style="" width="100%">
                                                <tbody>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    <!--[if mso | IE]></td></tr></table><![endif]--></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!--[if mso | IE]></td></tr></table></td></tr></table><![endif]--></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if mso | IE]></td></tr></table></td></tr> <tr> <td class="" width="600px"> <table align="center" border="0" cellpadding="0" cellspacing="0" class="" role="presentation" style="width:600px;" width="600" bgcolor="#1B2256"> <tr> <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                <div
style="background:#1B2256;background-color:#1B2256;margin:0px auto;max-width:600px;">
                  <table align="center" border="0" cellpadding="0"
                    cellspacing="0" role="presentation"
style="background:#1B2256;background-color:#1B2256;width:100%;">
                    <tbody>
                      <tr>
                        <td
style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-top:0px;text-align:center;"><!--[if mso | IE]> <table role="presentation" border="0" cellpadding="0" cellspacing="0"> <tr> <td class="" style="vertical-align:top;width:600px;"><![endif]-->
                          <div
class="mj-column-per-100 mj-outlook-group-fix"
style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                            <table border="0" cellpadding="0"
                              cellspacing="0" role="presentation"
                              style="vertical-align:top;" width="100%">
                              <tbody>
                                <tr>
                                  <td align="left"
style="font-size:0px;padding:0px 24px;padding-top:22px;padding-right:24px;padding-left:24px;word-break:break-word;">
                                    <div
style="font-family:system-ui, sans-serif;font-size:14px;font-weight:300;line-height:22px;text-align:left;color:#ffffff;">
                                      <p>Ce courriel vous est envoyé
                                        automatiquement, merci de ne pas
                                        utiliser la fonction "répondre à
                                        l'expéditeur".</p>
                                      <p>Pour plus d’informations sur la
                                        manière dont FT utilise vos
                                        données, consultez leur <a
                                          style="color:#fff"
href="https://www.francetravail.fr/informations/informations-legales-et-conditio/protection-des-donnees-personnel.html?at_medium=CMP&amp;at_campaign=DSI&amp;at_cmp_indicateur1=AbonnementOffres&amp;at_cmp_indicateur2=mail&amp;at_cmp_indicateur3=nouvelleOffre"
                                          moz-do-not-send="true">Politique
                                          de Confidentialité</a>.</p>
                                      <p>Une question&nbsp;? Consultez
                                        leur page <a
                                          style="color:#fff"
href="https://www.francetravail.fr/faq/candidat.html?at_medium=CMP&amp;at_campaign=DSI&amp;at_cmp_indicateur1=AbonnementOffres&amp;at_cmp_indicateur2=mail&amp;at_cmp_indicateur3=nouvelleOffre"
                                          moz-do-not-send="true">"Questions
                                          et Contacts"</a>.</p>
                                      <p>Voulez-vous vous désinscrire ? Cliquez ici : <a
                                          style="color:#fff"
href="https://francetrouvaille.naytheet.fr?delete=<?= $email ?>"
                                          moz-do-not-send="true">"Supprimer l'alerte"</a>.</p>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <!--[if mso | IE]></td></tr></table><![endif]--></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--[if mso | IE]></td></tr></table></td></tr></table><![endif]--></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--[if mso | IE]></td></tr></table><![endif]--></div>



  </body>
</html>