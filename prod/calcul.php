<?php
require __DIR__.'/vendor/autoload.php';

##### Variables

    $prix_achat = $data['prix-achat'];
    $notaire_t1 = 10; // pourcent : tranche 0 -> 100,000
    $notaire_t2 = 8; // pourcent : tranche 100,000 -> 300,000
    $notaire_t3 = 7; // pourcent : tranche 300,000 -> 1,000,000+
    $taux = $data['taux']/100;
    $taux_assurance = 0.36/100; //0,36
    $duree_credit = $data['duree']; // ans
    $charges = $data['charges']; // annuel
    $foncier = $data['foncier'];
    $frais_dossier = 1500; // euros
    $loyer = $data['loyer']; // annuel
    $pno = 160; // euros annuel
    $foncier = null; // annuel
    $charges = null; // annuel
    $travaux = null;
    $duree_credit_mois = null;

##### Calcul

    if($prix_achat > 0 && $prix_achat < 100000)
    {
        $notaire = $notaire_t1;
    }elseif($prix_achat > 100000 && $prix_achat < 300000)
    {
        $notaire = $notaire_t2;
    }else {
        $notaire = $notaire_t3;
    }

    if(($data['foncier']) != null)
    {
        $foncier = $data['foncier'];
    }

    if(($data['charges']) != null)
    {
        $charges = $data['charges'];
    }

    if(($data['travaux']) != null)
    {
        $travaux = $data['travaux'];
    }

    if($duree_credit == 20)
    {
        $duree_credit_mois = 240;
        $taux = 1.33/100;
    } elseif($duree_credit == 25)
    {
        $duree_credit_mois = 300;
        $taux = 1.55/100;
    }

    $total_notaire = $prix_achat*$notaire/100;
    $prix_total = $prix_achat+$total_notaire+$frais_dossier+$travaux;


##### Mensualités calcul

    $mensualite = ($prix_total*($taux/12))/(1-pow(1+($taux/12),(-$duree_credit_mois)));
    $mensualite_assurance = ($taux_assurance*($prix_total-$frais_dossier))/12;
    $mensualite_total = round($mensualite+$mensualite_assurance, 2);

    $cout_total_credit = ($mensualite_total*$duree_credit_mois)-$prix_total;

##### Rendement & Cashflow

    $rendement_brut = round($loyer/($prix_total-$frais_dossier)*100, 2);
    $rendement_net = round(($loyer-($foncier+$pno+$charges))/($prix_total-$frais_dossier)*100, 2);
    $cashflow = round(($loyer/12)-($foncier/12)-($charges/12)-($pno/12)-$mensualite_total, 2);


    //$a = array("total_notaire" => $total_notaire,"prix total" => $prix_total,"mensualité" => $mensualite,"mensualité assurance" => $mensualite_assurance,"mensualité totale" => $mensualite_total,"cout total crédit" => $cout_total_credit,"rendement brut" => $rendement_brut,"rendement net" => $rendement_net,"cashflow" => $cashflow,"charges" => $charges,"foncier" => $foncier,"travaux" => $travaux,"loyer" =>$loyer,"notaire" => $notaire,"taux" => $taux,"taux assurance" => $taux_assurance, "PNO" => $pno,"durée crédit" => $duree_credit);
    //dump($a);

    if($rendement_brut > 10){ $class_rendement_brut = "success"; }else{ $class_rendement_brut = "warning"; }
    if($rendement_net> 8){ $class_rendement_net = "success"; }else{ $class_rendement_net = "warning"; }
    if($cashflow > 100){ $class_cashflow = "success"; }else{ $class_cashflow = "warning"; }

##### Affichage
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Montant du prêt</th>
                    <th scope="col">Frais notaire (inclus)</th>
                    <th scope="col">Durée du prêt</th>
                    <th scope="col">Taux d'intérêt</th>
                    <th scope="col">Taux d'assurance</th>
                    <th scope="col">Mensualités</th>
                    <th scope="col">Coût du crédit</th>
                    <th scope="col">Rendement Brut</th>
                    <th scope="col">Rendement Net</th>
                    <th scope="col">Cashflow</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><div class="alert alert-primary" role="alert"><?= number_format($prix_total,-2,' ',',') ?>€</div></td>
                    <td><div class="alert alert-primary" role="alert"><?= number_format($total_notaire,-2,' ',',') ?>€</td>
                    <td><div class="alert alert-primary" role="alert"><?= $duree_credit ?> ans</div></td>
                    <td><div class="alert alert-primary" role="alert"><?= $taux*100 ?>%</div></td>
                    <td><div class="alert alert-primary" role="alert"><?= $taux_assurance*100 ?>%</div></td>
                    <td><div class="alert alert-primary" role="alert"><?= $mensualite_total ?>€</div></td>
                    <td><div class="alert alert-primary" role="alert"><?= number_format(round($cout_total_credit, 2),-2,' ',',') ?>€</div></td>
                    <td><div class="alert alert-<?= $class_rendement_brut ?>" role="alert"><?= $rendement_brut ?>%</div></td>
                    <td><div class="alert alert-<?= $class_rendement_net ?>" role="alert"><?= $rendement_net ?>%</div></td>
                    <td><div class="alert alert-<?= $class_cashflow ?>" role="alert"><?= round($cashflow, 2) ?>€</div></td>
                </tr>
                </tbody>
            </table>
            <?php
            if($class_rendement_net == "warning" or $class_rendement_brut == "warning" or $class_cashflow == "warning")
            {
             ?>
                <div class="alert alert-warning" role="alert">
                🔥 Attention, le rendement ou le cashflow semble(ent) insuffisant.
                </div>
             <?php
            } else {
            ?>
                <div class="alert alert-success" role="alert">
                    ✅ Ce bien semble être rentable !
                </div>
            <?php
            	}
            ?>
            <?php
				if($foncier != null)
				{
					$foncier_mois = round($foncier/12, 2);
				} else {
					$foncier_mois = 0;
				}
				if($charges != null)
				{
					$charges_mois = round($charges/12,2);
				}else {
					$charges_mois = 0;
				}
            ?>
        </div>
    </div>
</div>

<?php include "editor.php"; ?>