<?php

// ------------------------------------------------------------------------------

function f_desaccentuation_EU($chaine,$type = 'ttc'){
	// désaccentuation => deemphasis (EN)
	// $type (optionnel) -> bdc,cap,ttc
	// Couvre 712 caractères UTF-8 pour les tables : 
	// Basic Latin, Latin-1 Supplement, Latin Extended-A,
	// Latin Extended-B, Latin Extended-C et autres.
	// Couvre partiellement les caractères UTF-8 Latin-D.
	
	// http://www.fileformat.info/info/unicode/index.htm
	// http://www.unicode.org/
			
    $tableBcd = array(
	'đ'=>'dj', 'ǆ'=>'dz', 'ǉ'=>'lj', 'ǌ'=>'nj', 'ǳ'=>'dz', 'ß'=>'Ss', 
	'æ'=>'ae', 'ǣ'=>'ae', 'ǽ'=>'ae', 'ǎ'=>'a', 'ǻ'=>'a',
	'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 
	'å'=>'a', 'ā'=>'a', 'ą'=>'a', 'ă'=>'a', 'ⱥ'=>'a', 
	'ȧ'=>'a', 'ǟ'=>'a', 'ǡ'=>'a', 'ȁ'=>'a', 'ȃ'=>'a',  
	'ạ'=>'a', 'ả'=>'a', 'ấ'=>'a', 'ầ'=>'a', 'ẩ'=>'a', 
	'ẫ'=>'a', 'ậ'=>'a', 'ắ'=>'a', 'ằ'=>'a', 'ẳ'=>'a', 
	'ẵ'=>'a', 'ặ'=>'a', 'ḁ'=>'a', 'ẚ'=>'a', 'ƌ'=>'nd', 
	'ꜳ'=>'aa', 'ꜹ'=>'av', 'ꜻ'=>'av',
	'þ'=>'b', 'ƀ'=>'b', 'Ƅ'=>'b', 'ƅ'=>'b', 'ƃ'=>'mb', 
	'ḃ'=>'b', 'ḅ'=>'b', 'ḇ'=>'b', 
	'ç'=>'c', 'ć'=>'c', 'č'=>'c', 'ĉ'=>'c', 'ċ'=>'c', 
	'ƈ'=>'c', 'ḉ'=>'c', 'ȼ'=>'c', 'ꜿ'=>'c', 
	'ď'=>'d', 'ð'=>'d', 'ḋ'=>'d', 'ḍ'=>'d', 'ḏ'=>'d',
	'ḑ'=>'d', 'ḓ'=>'d', 'ẟ'=>'d', 'ȸ'=>'db','ƍ'=>'d',
	'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ē'=>'e', 
	'ę'=>'e', 'ě'=>'e', 'ĕ'=>'e', 'ė'=>'e', 'ẹ'=>'e', 
	'ẻ'=>'e', 'ẽ'=>'e', 'ế'=>'e', 'ề'=>'e', 'ể'=>'e', 
	'ễ'=>'e', 'ệ'=>'e', 'ḕ'=>'e', 'ḗ'=>'e', 'ḙ'=>'e', 
	'ḛ'=>'e', 'ḝ'=>'e', 'ǝ'=>'e', 'ȅ'=>'e', 'ȇ'=>'e', 
	'ɇ'=>'e', 'ȩ'=>'e', 'ⱸ'=>'e', 'ⱻ'=>'e', 
	'ƒ'=>'f', 'ḟ'=>'f', 'ẛ'=>'f', 'ẜ'=>'f', 'ẝ'=>'f', 
	'ꜰ'=>'f', 
	'ĝ'=>'g', 'ğ'=>'g', 'ġ'=>'g', 'ģ'=>'g', 'ḡ'=>'g', 
	'ǥ'=>'g', 'ǧ'=>'g', 'ǵ'=>'g', 
	'ĥ'=>'h', 'ħ'=>'h', 'ⱨ'=>'h', 'ⱶ'=>'h', 'ḣ'=>'h', 
	'ḥ'=>'h', 'ḧ'=>'h', 'ḩ'=>'h', 'ḫ'=>'h', 'ȟ'=>'h', 
	'ẖ'=>'h', 'ƕ'=>'h', 'ꜧ'=>'h', 
	'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ī'=>'i', 
	'ĩ'=>'i', 'ĭ'=>'i', 'į'=>'i', 'ı'=>'i', 'ỉ'=>'i', 
	'ị'=>'i', 'ȉ'=>'i', 'ȋ'=>'i', 'ǐ'=>'i', 'ḭ'=>'i', 
	'ḯ'=>'i', 'ỻ'=>'il',
	'ĳ'=>'j', 'ĵ'=>'j', 'ɉ'=>'j', 'ȷ'=>'j', 'ǰ'=>'j', 
	'ⱼ'=>'j', 
	'ķ'=>'k', 'ĸ'=>'k', 'ⱪ'=>'k', 'ḱ'=>'k', 'ḳ'=>'k', 
	'ḵ'=>'k', 'ǩ'=>'k', 'ƙ'=>'k', 'ꝁ'=>'k', 'ꝃ'=>'k', 
	'ꝅ'=>'k', 
	'ł'=>'l', 'ľ'=>'l', 'ĺ'=>'l', 'ļ'=>'l', 'ŀ'=>'l', 
	'ⱡ'=>'l', 'ḷ'=>'l', 'ḹ'=>'l', 'ḻ'=>'l', 'ḽ'=>'l', 
	'Ɩ'=>'l', 'ƚ'=>'l', 'ꝉ'=>'l', 'ꞁ'=>'l', 
	'ḿ'=>'m', 'ṁ'=>'m', 'ṃ'=>'m', 'ɯ'=>'m', 
	'ñ'=>'n', 'ń'=>'n', 'ň'=>'n', 'ņ'=>'n', 'ŉ'=>'n', 
	'ŋ'=>'n', 'ṅ'=>'n', 'ṇ'=>'n', 'ṉ'=>'n', 'ṋ'=>'n',
	'ǹ'=>'n', 'ƞ'=>'n', 
	'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 
	'ø'=>'o', 'ō'=>'o', 'ő'=>'o', 'ŏ'=>'o', 'ꝋ'=>'o',  
	'ợ'=>'o', 'ỡ'=>'o', 'ọ'=>'o', 'ỏ'=>'o', 'œ'=>'oe', 
	'ố'=>'o', 'ồ'=>'o', 'ổ'=>'o', 'ỗ'=>'o', 'ộ'=>'o', 
	'ớ'=>'o', 'ờ'=>'o', 'ở'=>'o', 'ȍ'=>'o', 'ȏ'=>'o', 
	'ǿ'=>'o', 'ǒ'=>'o', 'ṍ'=>'o', 'ṏ'=>'o', 'ṑ'=>'o', 
	'ṓ'=>'o', 'ȫ'=>'o', 'ȭ'=>'o', 'ȯ'=>'o', 'ȱ'=>'o', 
	'ǫ'=>'o', 'ǭ'=>'o', 'ơ'=>'o', 'ȣ'=>'ou','ƣ'=>'oi', 
	'ⱺ'=>'o', 'ꝏ'=>'oo', 
	'ṕ'=>'p', 'ṗ'=>'p', 'ƥ'=>'p', 
	'ɋ'=>'q', 'ȹ'=>'qp', 
	'ŕ'=>'r', 'ř'=>'r', 'ŗ'=>'r', 'ṙ'=>'r', 'ṛ'=>'r', 
	'ṝ'=>'r', 'ṟ'=>'r', 'ɍ'=>'r', 'ȑ'=>'r', 'ȓ'=>'r', 
	'ⱹ'=>'r', 'ꝛ'=>'r', 
	'ś'=>'s', 'š'=>'s', 'ş'=>'s', 'ŝ'=>'s', 'ș'=>'s', 
	'ſ'=>'s', 'ƨ'=>'s', 'ș'=>'s', 'ṡ'=>'s', 'ṣ'=>'s', 
	'ṥ'=>'s', 'ṧ'=>'s', 'ṩ'=>'s', 'ꜱ'=>'s', 
	'ť'=>'t', 'ţ'=>'t', 'ŧ'=>'t', 'ț'=>'t', 'ⱦ'=>'t', 
	'ṫ'=>'t', 'ṭ'=>'t', 'ṯ'=>'t', 'ṱ'=>'t', 'ț'=>'t',
	'ẗ'=>'t', 'ƫ'=>'t', 'ƭ'=>'t',
	'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ū'=>'u', 
	'ů'=>'u', 'ű'=>'u', 'ŭ'=>'u', 'ũ'=>'u', 'ų'=>'u', 
	'ự'=>'u', 'ữ'=>'u', 'ử'=>'u', 'ừ'=>'u', 'ứ'=>'u', 
	'ủ'=>'u', 'ụ'=>'u', 'ṳ'=>'u', 'ṵ'=>'u', 'ṷ'=>'u', 
	'ṹ'=>'u', 'ṻ'=>'u', 'ȕ'=>'u', 'ǔ'=>'u', 'ǖ'=>'u', 
	'ǘ'=>'u', 'ǚ'=>'u', 'ǜ'=>'u', 'ȗ'=>'u', 'ư'=>'u', 
	'ʉ'=>'u', 'ʊ'=>'u',
	'ⱴ'=>'v', 'ṽ'=>'v', 'ṿ'=>'v', 'ỽ'=>'v', 'ʋ'=>'v', 
	'ⱱ'=>'v', 
	'ŵ'=>'w', 'ẘ'=>'w', 'ẁ'=>'w', 'ẃ'=>'w', 'ẅ'=>'w',
	'ẇ'=>'w', 'ẉ'=>'w', 'ƿ'=>'w', 'ⱳ'=>'w', 
	'ẋ'=>'x', 'ẍ'=>'x', 
	'ý'=>'y', 'ỳ'=>'y', 'ÿ'=>'y', 'ŷ'=>'y', 'ỿ'=>'y', 
	'ỵ'=>'y', 'ỷ'=>'y', 'ỹ'=>'y', 'ẙ'=>'y', 'ẏ'=>'y', 
	'ɏ'=>'y', 'ȳ'=>'y', 'ƴ'=>'y', 'ȝ'=>'y', 
	'ž'=>'z', 'ż'=>'z', 'ⱬ'=>'z', 'ź'=>'z', 'ȥ'=>'z',
	'ẑ'=>'z', 'ẓ'=>'z', 'ẕ'=>'z', 'ǯ'=>'z', 'ƹ'=>'z', 
	'ƶ'=>'z'
	);
			
    $tableCap = array(
	'Đ'=>'Dj','ß'=>'Ss','ẞ'=>'SS','Ǆ'=>'DZ','ǅ'=>'Dz',
	'Ǉ'=>'LJ','ǈ'=>'Lj','Ǌ'=>'NJ','ǋ'=>'Nj','Ǳ'=>'DZ',
	'ǲ'=>'Dz',
	'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
	'Å'=>'A', 'Ā'=>'A', 'Ą'=>'A', 'Ă'=>'A', 'Æ'=>'AE', 
	'Ǎ'=>'A', 'Ǻ'=>'A', 'Ǽ'=>'AE', 'Ȁ'=>'A', 'Ȃ'=>'A', 
	'Ȧ'=>'A', 'Ⱥ'=>'A', 'Ǟ'=>'A', 'Ǡ'=>'A', 'Ǣ'=>'AE', 
	'Ạ'=>'A', 'Ả'=>'A', 'Ấ'=>'A', 'Ầ'=>'A', 'Ẩ'=>'A', 
	'Ẫ'=>'A', 'Ậ'=>'A', 'Ắ'=>'A', 'Ằ'=>'A', 'Ẳ'=>'A', 
	'Ẵ'=>'A', 'Ặ'=>'A', 'Ḁ'=>'A', 'Ƌ'=>'ND', 'Ɑ'=>'A',
	'Ɐ'=>'A', 'Ꜳ'=>'AA', 'Ꜳ'=>'AV', 'Ꜻ'=>'AV', 
	'Þ'=>'B', 'Ƃ'=>'MB', 'Ɓ'=>'B', 'Ḃ'=>'B', 'Ḅ'=>'B', 
	'Ḇ'=>'B', 'Ƀ'=>'B',
	'Ç'=>'C', 'Ć'=>'C', 'Č'=>'C', 'Ĉ'=>'C', 'Ċ'=>'C', 
	'Ɔ'=>'C', 'Ƈ'=>'C', 'Ḉ'=>'C', 'Ȼ'=>'C', 'Ꜿ'=>'C', 
	'Ď'=>'D', 'Ɖ'=>'D', 'Ɗ'=>'D', 'Ḋ'=>'D', 'Ḍ'=>'D', 
	'Ḏ'=>'D', 'Ḑ'=>'D', 'Ḓ'=>'D', 'ƛ'=>'D', 
	'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ē'=>'E', 
	'Ę'=>'E', 'Ě'=>'E', 'Ĕ'=>'E', 'Ė'=>'E', 'Ẹ'=>'E', 
	'Ẻ'=>'E', 'Ẽ'=>'E', 'Ế'=>'E', 'Ề'=>'E', 'Ể'=>'E', 
	'Ễ'=>'E', 'Ệ'=>'E', 'Ǝ'=>'E', 'Ə'=>'E', 'Ɛ'=>'E', 
	'Ḕ'=>'E', 'Ḗ'=>'E', 'Ḙ'=>'E', 'Ḛ'=>'E', 'Ḝ'=>'E', 
	'Ȅ'=>'E', 'Ȇ'=>'E', 'Ɇ'=>'E', 'Ȩ'=>'E', 
	'Ḟ'=>'F', 'Ƒ'=>'F', 'ƒ'=>'F', 'ꟻ'=>'F', 
	'Ĝ'=>'G', 'Ğ'=>'G', 'Ġ'=>'G', 'Ģ'=>'G', 'Ḡ'=>'G', 
	'Ǥ'=>'G', 'Ǧ'=>'G', 'Ǵ'=>'G', 'Ɠ'=>'G', 
	'Ĥ'=>'H', 'Ħ'=>'H', 'Ⱨ'=>'H', 'Ḣ'=>'H', 'Ḥ'=>'H', 
	'Ḧ'=>'H', 'Ḩ'=>'H', 'Ḫ'=>'H', 'Ȟ'=>'H', 'Ƕ'=>'H', 
	'Ꜧ'=>'H', 
	'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ī'=>'I', 
	'Ĩ'=>'I', 'Ĭ'=>'I', 'Į'=>'I', 'İ'=>'I', 'Ỉ'=>'I', 
	'Ị'=>'I', 'Ȉ'=>'I', 'Ȋ'=>'I', 'Ǐ'=>'I', 'Ḭ'=>'I', 
	'Ḯ'=>'I', 'Ɨ'=>'I', 'Ỻ'=>'IL', 'ꟾ'=>'I', 
	'Ĳ'=>'J', 'Ĵ'=>'J', 'Ɉ'=>'J', 
	'Ķ'=>'K', 'Ⱪ'=>'K', 'Ḱ'=>'K', 'Ḳ'=>'K', 'Ḵ'=>'K', 
	'Ǩ'=>'K', 'Ƙ'=>'K', 'Ꝁ'=>'K', 'Ꝃ'=>'K', 'Ꝅ'=>'K', 
	'Ł'=>'L', 'Ľ'=>'L', 'Ĺ'=>'L', 'Ļ'=>'L', 'Ŀ'=>'L',
	'Ⱡ'=>'L', 'Ɫ'=>'L', 'Ḷ'=>'L', 'Ḹ'=>'L', 'Ḻ'=>'L', 
	'Ḽ'=>'L', 'Ƚ'=>'L', 'Ꝉ'=>'L', 'Ꞁ'=>'L', 
	'Ḿ'=>'M', 'Ṁ'=>'M', 'Ṃ'=>'M', 'Ɯ'=>'M', 'Ɱ'=>'M', 
	'ꟽ'=>'M', 'ꟿ'=>'M', 
	'Ñ'=>'N', 'Ń'=>'N', 'Ň'=>'N', 'Ņ'=>'N', 'Ŋ'=>'N', 
	'Ṅ'=>'N', 'Ṇ'=>'N', 'Ṉ'=>'N', 'Ṋ'=>'N', 'Ǹ'=>'N', 
	'Ɲ'=>'N', 'Ƞ'=>'N', 
	'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 
	'Ø'=>'O', 'Ō'=>'O', 'Ő'=>'O', 'Ŏ'=>'O', 'Œ'=>'OE',
	'Ȱ'=>'O', 'Ọ'=>'O', 'Ỏ'=>'O', 'Ố'=>'O', 'Ồ'=>'O', 
	'Ổ'=>'O', 'Ỗ'=>'O', 'Ộ'=>'O', 'Ớ'=>'O', 'Ờ'=>'O', 
	'Ở'=>'O', 'Ỡ'=>'O', 'Ợ'=>'O', 'Ȍ'=>'O', 'Ȏ'=>'O', 
	'Ǿ'=>'O', 'Ǒ'=>'O', 'Ṍ'=>'O', 'Ṏ'=>'O', 'Ṑ'=>'O', 
	'Ṓ'=>'O', 'Ȫ'=>'O', 'Ȭ'=>'O', 'Ȯ'=>'O', 'Ǫ'=>'O', 
	'Ǭ'=>'O', 'Ɵ'=>'O', 'Ơ'=>'O', 'Ȣ'=>'OU','Ƣ'=>'OI', 
	'Ꝋ'=>'O', 'Ꝏ'=>'OO', 
	'Ᵽ'=>'P', 'Ṕ'=>'P', 'Ṗ'=>'P', 'Ƥ'=>'P', 'ꟼ'=>'P', 
	'Ɋ'=>'Q',
	'Ŕ'=>'R', 'Ř'=>'R', 'Ŗ'=>'R', 'Ɽ'=>'R', 'Ṙ'=>'R', 
	'Ṛ'=>'R', 'Ṝ'=>'R', 'Ṟ'=>'R', 'Ɍ'=>'R', 'Ȑ'=>'R', 
	'Ȓ'=>'R', 'Ʀ'=>'R', 'Ꝛ'=>'R', 
	'Ś'=>'S', 'Š'=>'S', 'Ş'=>'S', 'Ŝ'=>'S', 'Ș'=>'S', 
	'Ƨ'=>'S', 'Ș'=>'S', 'Ṡ'=>'S', 'Ṣ'=>'S', 'Ṥ'=>'S', 
	'Ṧ'=>'S', 'Ṩ'=>'S', 
	'Ť'=>'T', 'Ţ'=>'T', 'Ŧ'=>'T', 'Ț'=>'T', 'Ṫ'=>'T', 
	'Ṭ'=>'T', 'Ṯ'=>'T', 'Ṱ'=>'T', 'Ț'=>'T', 'Ⱦ'=>'T', 
	'Ƭ'=>'T', 'Ʈ'=>'T',
	'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ū'=>'U', 
	'Ů'=>'U', 'Ű'=>'U', 'Ŭ'=>'U', 'Ũ'=>'U', 'Ų'=>'U',
	'Ụ'=>'U', 'Ủ'=>'U', 'Ứ'=>'U', 'Ừ'=>'U', 'Ử'=>'U', 
	'Ữ'=>'U', 'Ự'=>'U', 'Ṳ'=>'U', 'Ṵ'=>'U', 'Ṷ'=>'U', 
	'Ṹ'=>'U', 'Ṻ'=>'U', 'Ȕ'=>'U', 'Ǔ'=>'U', 'Ǖ'=>'U', 
	'Ǘ'=>'U', 'Ǚ'=>'U', 'Ǜ'=>'U', 'Ȗ'=>'U', 'Ư'=>'U', 
	'Ʉ'=>'U', 'Ʊ'=>'U', 
	'Ṽ'=>'V', 'Ṿ'=>'V', 'Ɣ'=>'V', 'Ỽ'=>'V', 'Ʌ'=>'V', 
	'Ʋ'=>'V', 'ⱽ'=>'V', 
	'Ŵ'=>'W', 'Ẁ'=>'W', 'Ẃ'=>'W', 'Ẅ'=>'W', 'Ẇ'=>'W',
	'Ẉ'=>'W', 'Ƿ'=>'W', 'Ⱳ'=>'W', 
	'Ẋ'=>'X', 'Ẍ'=>'X', 
	'Ý'=>'Y', 'Ŷ'=>'Y', 'Ÿ'=>'Y', 'Ỿ'=>'Y', 'Ỳ'=>'Y', 
	'Ỵ'=>'Y', 'Ỷ'=>'Y', 'Ỹ'=>'Y', 'Ɏ'=>'Y', 'Ẏ'=>'Y', 
	'Ȳ'=>'Y', 'Ƴ'=>'Y', 'Ȝ'=>'Y', 
	'Ź'=>'Z', 'Ž'=>'Z', 'Ⱬ'=>'Z', 'Ż'=>'Z', 'Ẑ'=>'Z', 
	'Ẓ'=>'Z', 'Ẕ'=>'Z', 'Ƶ'=>'Z', 'Ȥ'=>'Z', 'Ƹ'=>'Z', 
	'Ǯ'=>'Z', 'Ʒ'=>'Z'
	);
	
	$tableSpecial = array(
		 // transcription impossible, 
		 // la plupart étant des annotations phonétiques latines
		 // ou des transcriptions latines de hiéroglyphes
		'Ʃ'=>'', 'ƪ'=>'', 'ǀ'=>'', 'ǂ'=>'', 'ǁ'=>'', 
		'ƻ'=>'', 'ƾ'=>'', 'Ɂ'=>'', 'ⱷ'=>'', 'ɂ'=>'',
		'꜠'=>'', '꜡'=>'', 'Ƽ'=>'5', 'ƽ'=>'5'
	);
	
	switch($type){
		case 'bdc': $table = $tableBcd; break;
		case 'cap': $table = $tableCap; break;
		case 'spe': $table = $tableSpecial; break;
		case 'ttc': $table = array_merge($tableBcd,$tableCap,$tableSpecial); break;
	}
    return strtr($chaine,$table);
}


// ------------------------------------------------------------------------------

$corps='';

$nom=f_desaccentuation_EU($_POST['nom']);
$email=$_POST['email'];
$site=$_POST['siteWeb'];
$objet=$_POST['objet'];
$message=$_POST['message'];


$corps = '<p>Nom : <strong>'.$nom.'</strong></p>';
$corps .= '<p>Email: <a href="mailto:'.$email.'">'.$email.'</a></p>';
$corps .= '<p>Site: <a href="siteWeb :'.$site.'">'.$site.'</a></p>';
$corps .= '<p><strong>Objet : </strong>'.$objet.'</p>';
$corps .= '<p><strong>Message du client : </strong>'.$message.'</p>';


require('PHPMailer/class.phpmailer.php');

$mail = new PHPMailer();

$body = $corps;

$mail->SetFrom($email, $site.' '.$nom);

//-----------------------------------------------------------------------------
// $destinataire ='contact@conctact.fr';
$destinataire ='info@freevoice-consulting.com';
$mail->AddAddress($destinataire, '');
//-----------------------------------------------------------------------------

$mail->Subject    = 'Contact depuis votre site : '.$objet;
//$mail->AltBody    = 'To view the message, please use an HTML compatible email viewer!'; // optional, comment out and test

$mail->MsgHTML($body);

if(!$mail->Send()) {
  header("Location: Message-non-envoye.html");
} else {
  header("Location: Message-envoye.html");
}
?>