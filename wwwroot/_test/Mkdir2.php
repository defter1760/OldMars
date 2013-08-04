<?php
$share = '\\\\FILES\\MassAction';
echo 'current user: '; var_dump( get_current_user() );
 
echo '---TEST-ONE---'."\n";
$targets = array(
        'exists' =>'test_folder',
        'missing'=>'not_here',
        'file'=>'foo.txt',
);
foreach( $targets as $name => $target ) {
        echo $name."\n";
        $path = $share . DIRECTORY_SEPARATOR . $target;
        echo '  path:   '; var_dump( $path );
        echo '  is_dir: '; var_dump( is_dir( $path ) );
}
echo '---TEST-TWO---'."\n";
$bartxt = fopen( ( $share . DIRECTORY_SEPARATOR . 'bar.txt' ), "w" ) 
  or false;
if( !$bartxt ) {
        echo 'failed to open stream';
} else {
        fwrite( $bartxt, 'FUBAR '.time() );
        fclose( $bartxt );
        echo 'wrote file.';
}?>
