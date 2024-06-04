<?php
function getDiscountNoPacks($noSonPacks)
{
    $totalNoSonPacks = 0;
    if (count($noSonPacks) > 0 && count($noSonPacks) <= 2) {
        for ($i = 0; $i < count($noSonPacks); $i++) {
            $totalNoSonPacks +=  intval($noSonPacks[$i]['precio']);
        }
    } else if (count($noSonPacks) >= 3 && count($noSonPacks) <= 9) {
        for ($i = 0; $i < count($noSonPacks); $i++) {
            $totalNoSonPacks +=  floor(intval($noSonPacks[$i]['precio']) - ceil(intval($noSonPacks[$i]['precio']) * 0.15));
        }
    } else if (count($noSonPacks) >= 10 && count($noSonPacks) <= 19) {
        for ($i = 0; $i < count($noSonPacks); $i++) {
            $totalNoSonPacks +=  floor(intval($noSonPacks[$i]['precio']) - ceil(intval($noSonPacks[$i]['precio']) * 0.27));
        }
    } else if (count($noSonPacks) >= 20 && count($noSonPacks) <= 29) {
        for ($i = 0; $i < count($noSonPacks); $i++) {
            $totalNoSonPacks +=  floor(intval($noSonPacks[$i]['precio']) - ceil(intval($noSonPacks[$i]['precio']) * 0.36));
        }
    } else {
        for ($i = 0; $i < count($noSonPacks); $i++) {
            $totalNoSonPacks +=  floor(intval($noSonPacks[$i]['precio']) - ceil(intval($noSonPacks[$i]['precio']) * 0.45));
        }
    }

    return $totalNoSonPacks;
}

function getDiscountBodyEmail($carrito)
{
    $ContenidosBody = "";
    $noSonPacks = array_values(array_filter($carrito, function ($item) {
        return $item['isPack'] === false;
    }));
    for ($n = 0; $n < count($carrito); $n++) {
        $ContenidosBody .= $carrito[$n]['nombre'] . '[' . $carrito[$n]['tonos'] . ']' . ' - $';
        if ($carrito[$n]['isPack'] === false) {
            if (count($noSonPacks) > 0 && count($noSonPacks) <= 2) {
                $ContenidosBody .= $carrito[$n]['precio'];
            } else if (count($noSonPacks) >= 3 && count($noSonPacks) <= 9) {
                $ContenidosBody .= floor(intval($noSonPacks[$n]['precio']) - ceil(intval($noSonPacks[$n]['precio']) * 0.15));
            } else if (count($noSonPacks) >= 10 && count($noSonPacks) <= 19) {
                $ContenidosBody .= floor(intval($noSonPacks[$n]['precio']) - ceil(intval($noSonPacks[$n]['precio']) * 0.27));
            } else if (count($noSonPacks) >= 20 && count($noSonPacks) <= 29) {
                $ContenidosBody .= floor(intval($noSonPacks[$n]['precio']) - ceil(intval($noSonPacks[$n]['precio']) * 0.36));
            } else {
                $ContenidosBody .= floor(intval($noSonPacks[$n]['precio']) - ceil(intval($noSonPacks[$n]['precio']) * 0.45));
            }
        } else {
            $ContenidosBody .= $carrito[$n]['precio'];
        }
        $ContenidosBody .= "<br>";
    }
    return $ContenidosBody;
}

function getPercentagePerSong($noSonPacks)
{
    $discount = 0;
    if (count($noSonPacks) > 0 && count($noSonPacks) <= 2) {
        $discount = 1;
    } else if (count($noSonPacks) >= 3 && count($noSonPacks) <= 9) {
        $discount = 0.15;
    } else if (count($noSonPacks) >= 10 && count($noSonPacks) <= 19) {
        $discount = 0.27;
    } else if (count($noSonPacks) >= 20 && count($noSonPacks) <= 29) {
        $discount = 0.36;
    } else {
        $discount = 0.45;
    }
    return $discount;
}
