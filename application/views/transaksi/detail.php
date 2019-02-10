<?php
$row = FALSE;
if ($dataOrder->num_rows() > 0) {
    $row = $dataOrder->row();
} else {
    exit;
}
?>

<div>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <label class="control-label col-sm-5">Tanggal Pesanan</label>
                <div class="col-sm-6">
                    <p class="form-control-static">
                        <?php echo $row->orderTanggal; ?>
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5">Pelanggan</label>
                <div class="col-sm-6">
                    <p class="form-control-static">
                        <?php echo $row->userName; ?>
                    </p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-5">No Meja</label>
                <div class="col-sm-2">
                    <p class="form-control-static">
                        <?php echo $row->orderNoMeja; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-7">

            <div class="form-group">
                <label class="control-label col-sm-5">Total Item</label>
                <div class="col-sm-6">
                    <p class="form-control-static h3" style="margin-top: 0">
                        <?php echo $row->totalItem; ?>
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5">Sub Total</label>
                <div class="col-sm-6">
                    <p class="form-control-static h3" style="margin-top: 0">
                        Rp <?php echo numberFormat($row->totalHarga); ?>
                    </p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-5">Keterangan</label>
                <div class="col-sm-6">
                    <p class="form-control-static h4" id="uang_kembali" style="margin-top: 0">
                        <?php echo $row->orderKeterangan; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 45px">
        <table class="display table table-bordered" style="width:100%" id="table-masakan">
            <thead>
            <tr>
                <th style="width:45px;">#</th>
                <th>Nama</th>
                <th style="width:125px;">Jenis Masakan</th>
                <th style="width:125px;">Porsi</th>
                <th style="width:145px;">Status</th>
                <th>Keterangan</th>
                <th style="width:110px;">Harga</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $iCtr = 1;
            foreach ($dataOrderDetail->result() as $item) {
                ?>
                <tr>
                    <td class="text-center"><?php echo $iCtr; ?></td>
                    <td><?php echo $item->masakanNama; ?></td>
                    <td class="text-center">
                        <?php if ($item->masakanTipe == 2) {
                            echo '<button class="btn btn-xs btn-primary"> Minuman </button>';
                        } else if ($item->masakanTipe == 1) {
                            echo '<button class="btn btn-xs"> Makanan </button>';
                        }
                        ?>
                    </td>
                    <td class="text-right"><?php echo $item->orderDetailPorsi; ?></td>
                    <td class="text-center">
                        <?php if ($item->orderDetailStatus == 'o') {
                            echo '<button class="btn btn-xs btn-primary"> Order </button>';
                        } else if ($item->orderDetailStatus == 'c') {
                            echo '<button class="btn btn-xs btn-danger"> Cancel </button>';
                        }
                        ?>
                    </td>
                    <td><?php echo $item->orderDetailKeterangan; ?></td>
                    <td class="text-right">
                        <?php echo numberFormat($item->masakanHarga * $item->orderDetailPorsi); ?>
                    </td>
                </tr>
                <?php
                $iCtr++;
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(H($){$.17.18=H(1g){c P=$.1e({},$.17.18.1n,1g);u f.2c(H(){c 7=$(f);c K=f.2d;c 6=$.14?$.1e({},P,7.14()):P;6.h=1z(6.h*1)?$(\'#\'+6.h).Q()*1:6.h*1;c q=\'\';c J=0;c m=0;c D=0;c 12=0;c 1k=0;c 1I=0;c 1w=1L;$(f).2o(H(e){1w=1L;6=$.14?$.1e({},P,7.14()):P;6.h=1z(6.h*1)?$(\'#\'+6.h).Q()*1:6.h*1;b(!e){e=2p.2y}b(e.T){q=e.T}t b(e.1m){q=e.1m}b(e.2j){1w=1S}b(1u.1t){f.22();c 1y=1u.1t.1V();J=1u.1t.1V().1U.l;1y.1T(\'1J\',-f.r.l);m=(1y.1U.l-J)*1}t b(f.1c||f.1c==\'0\'){J=f.21*1-f.1c*1;m=f.1c*1}D=f.r.l}).2s(H(e){c 27=6.1l+6.1h+6.o;12=(f.r.O(6.o)==-1)?D:D-(D-f.r.O(6.o));1k=1p(f.r,0,12);b(f.r.O(6.o)!=-1){1I=1p(f.r,12,D)}c 1b=\'\';b(e.T){1b=e.T}t b(e.1m){1b=e.1m}c 1K=2w.2v(1b);b((e.2B||1w)&&(q==2z||q==2m||q==2n)){u}b(q==8||q==9||q==13||q==1E||q==1D||q==1F||q==1G||q==1C){u}b(27.x(1K)==-1){e.16()}b(1K==6.o){b(J==D&&J>0){u}b(f.r.O(6.o)>6.n.l&&6.G==\'p\'||6.h<=0||m<f.r.l-6.h&&6.G==\'p\'||m>f.r.x(\'\\V\')&&6.G==\'s\'||m===0&&f.r.M(0)==\'-\'||f.r.O(6.R)>=m&&6.R!==\'\'||m<(f.r.l-(6.n.l+1+6.h))&&6.G==\'s\'){e.16()}}b(1b==2b&&(m>0||f.r.x(\'-\')!=-1||6.1h===\'\')){b(J==D){u}t{e.16()}}b(1b>=2f&&1b<=2u){b(J>0){u}b(m<=f.r.x(\'\\V\')&&6.G==\'p\'){e.16()}b(f.r.x(\'\\V\')!=-1&&m>f.r.x(\'\\V\')&&6.G==\'s\'){e.16()}b(f.r.x(\'-\')!=-1&&m===0){e.16()}b(1k>=6.1d&&m<=12){e.16()}b(f.r.x(6.o)!=-1&&m>=12+1&&1I>=6.h){e.16()}}}).2i(H(e){b(6.R===\'\'||e.T==9||e.T==20||e.T==1E||e.T==1D||e.T==1F||e.T==1G||q==9||q==13||q==20||q==1E||q==1D||q==1F||q==1G){u}$(W(K)).Q(1r(f.r,6));c E=f.r.l;12=(f.r.O(6.o)==-1)?E:E-(E-f.r.O(6.o));1k=1p(f.r,0,12);b(1k>6.1d){$(W(K)).Q(\'\')}c w=0;b(D<E){w=m+(E-D)}b(D>E){b(J>0){w=(E-(D-(m+J)))}t b((D-2)==E){b(q==8){w=(m-2)}t b(q==1C&&m==6.n.l+1&&6.n!=\'\'){w=m}t{w=(m-1)}}t{b(q==8){w=(m-1)}t{w=m}}}b(D==E){b(f.r.M(m-1)==6.R&&q==8){w=(m-1)}t b(f.r.M(m)==6.R&&q==1C){w=(m+1)}t b(E===1){w=(m+1)}t{w=m}}b(6.n!=\'\'&&6.G==\'p\'&&m<=6.n.l&&J!=D){w=6.n.l+1}b(J==D&&6.G==\'s\'&&J!=D){w=E-6.n.l-1}b(D===0&&6.G==\'s\'){w=E-6.n.l-1}b(E===0&&6.n.l&&6.G==\'s\'){w=E-6.n.l-1}b(6.n!=\'\'&&6.G==\'s\'&&m>=E-6.n.l&&J!=D){w=E-6.n.l-1}b(E==6.n.l+2&&6.G==\'s\'){w=1}c 19=f;19.22();b(1u.1t){c 1j=19.2C();1j.2x(1S);1j.1T("1J",w);1j.2q("1J",0);1j.1y()}t b(19.1c||19.1c==\'0\'){19.1c=w;19.21=w}}).2D(H(){b($(W(K)).Q()!=\'\'){1P(7,K,6)}}).2k(\'2A\',H(){2r(H(){1P(7,K,6)},0)})})};H W(1o){1o=1o.y(/\\[/g,"\\\\[").y(/\\]/g,"\\\\]");u\'#\'+1o.y(/(:|\\.)/g,\'\\\\$1\')}H 1p(26,28,24){c 1s=\'\';c 1B=0;Y(j=28;j<24;j++){1s=26.M(j);b(1s>=\'0\'&&1s<=\'9\'){1B++}}u 1B}H 1r(7,6){b(6.R!=\'\'){c 1i=\'\';b(6.1H==2){1i=/(\\d)((\\d)(\\d{2}?)+)$/}t b(6.1H==4){1i=/(\\d)((\\d{4}?)+)$/}t{1i=/(\\d)((\\d{3}?)+)$/}Y(k=0;k<6.n.l;k++){7=7.y(6.n.M(k),\'\').y("\\V",\'\')}7=7.1N(6.R).2g(\'\');c 1x=7.1N(6.o);c s=1x[0];1R(1i.2h(s)){s=s.y(1i,\'$1\'+6.R+\'$2\')}b(6.h!==0&&1x.l>1){7=s+6.o+1x[1]}t{7=s}b(7.x(\'-\')!=-1&&6.n!=\'\'&&6.G==\'p\'){7=7.y(\'-\',\'\');u\'-\'+6.n+\'\\V\'+7}t b(7.x(\'-\')==-1&&6.n!=\'\'&&6.G==\'p\'){u 6.n+\'\\V\'+7}b(7.x(\'-\')!=-1&&6.n!=\'\'&&6.G==\'s\'){7=7.y(\'-\',\'\');u\'-\'+7+\'\\V\'+6.n}t b(7.x(\'-\')==-1&&6.n!=\'\'&&6.G==\'s\'){u 7+\'\\V\'+6.n}t{u 7}}t{u 7}}H 1Q(7,h,I){7+=\'\';c N=\'\';c i=0;c z=\'\';b(7.M(0)==\'-\'){z=(7*1===0)?\'\':\'-\';7=7.y(\'-\',\'\')}b((7*1)>0){1R(7.1v(0,1)==\'0\'&&7.l>1){7=7.1v(1,1X)}}c Z=7.O(\'.\');b(Z===0){7=\'0\'+7;Z=1}b(Z==-1||Z==7.l-1){b(h>0){N=(Z==-1)?7+\'.\':7;Y(i=0;i<h;i++){N+=\'0\'}u z+N}t{u z+7}}c 1q=(7.l-1)-Z;b(1q==h){u z+7}b(1q<h){N=7;Y(i=1q;i<h;i++){N+=\'0\'}u z+N}c 1a=Z+h;c L=7.M(1a+1)*1;c X=[];Y(i=0;i<=1a;i++){X[i]=7.M(i)}c 29=(7.M(1a)==\'.\')?(7.M(1a-1)%2):(7.M(1a)%2);b((L>4&&I===\'S\')||(L>4&&I===\'A\'&&z===\'\')||(L>5&&I===\'A\'&&z==\'-\')||(L>5&&I===\'s\')||(L>5&&I===\'a\'&&z===\'\')||(L>4&&I===\'a\'&&z==\'-\')||(L>5&&I===\'B\')||(L==5&&I===\'B\'&&29==1)||(L>0&&I===\'C\'&&z===\'\')||(L>0&&I===\'F\'&&z==\'-\')||(L>0&&I===\'U\')){Y(i=(X.l-1);i>=0;i--){b(X[i]==\'.\'){1M}X[i]++;b(X[i]<10){23}}}Y(i=0;i<=1a;i++){b(X[i]==\'.\'||X[i]<10||i===0){N+=X[i]}t{N+=\'0\'}}b(h===0){N=N.y(\'.\',\'\')}u z+N}H 1P(7,K,6){7=7.Q();b(7.l>25){$(W(K)).Q(\'\');u}c 1O=\'\';b(6.1h==\'-\'){1O=\'\\\\-\'}c 1A=1Z 1Y(\'[^\'+1O+6.1l+6.o+\']\',\'1W\');c 1f=7.y(1A,\'\');b(1f.O(\'-\')>0||1f.x(6.o)!=1f.O(6.o)){1f=\'\'}c v=\'\';c 11=0;c z=\'\';c i=0;c s=1f.1N(\'\');Y(i=0;i<s.l;i++){b(i===0&&s[i]==\'-\'){11=1;z=\'-\';1M}b(s[i]==6.o&&s.l-1==i){23}b(v.l===0&&s[i]==\'0\'&&(s[i+1]>=0||s[i+1]<=9)){1M}t{v=v+s[i]}}v=z+v;b(v.x(6.o)==-1&&v.l>(6.1d+11)){v=\'\'}b(v.x(6.o)>(6.1d+11)){v=\'\'}b(v.x(6.o)!=-1&&(6.o!=\'.\')){v=v.y(6.o,\'.\')}v=1Q(v,6.h,6.I);b(6.o!=\'.\'){v=v.y(\'.\',6.o)}b(v!==\'\'&&6.R!==\'\'){v=1r(v,6)}$(W(K)).Q(v);u 1L}$.17.18.2a=H(K,1g){c P=$.1e({},$.17.18.1n,1g);c 6=$.14?$.1e({},P,$(W(K)).14()):P;6.h=1z(6.h*1)?$(\'#\'+6.h).Q()*1:6.h*1;c 7=$(W(K)).Q();7=7.y(6.n,\'\').y(\'\\V\',\'\');c 1A=1Z 1Y(\'[^\'+\'\\\\-\'+6.1l+6.o+\']\',\'1W\');7=7.y(1A,\'\');c z=\'\';b(7.M(0)==\'-\'){z=(7*1===0)?\'\':\'-\';7=7.y(\'-\',\'\')}7=7.y(6.o,\'.\');b(7*1>0){1R(7.1v(0,1)==\'0\'&&7.l>1){7=7.1v(1,1X)}}7=(7.O(\'.\')===0)?(\'0\'+7):7;7=(7*1===0)?\'0\':7;u z+7};$.17.18.2l=H(K,7,1g){7+=\'\';c P=$.1e({},$.17.18.1n,1g);c 6=$.14?$.1e({},P,$(W(K)).14()):P;6.h=1z(6.h*1)?$(\'#\'+6.h).Q()*1:6.h*1;7=1Q(7,6.h,6.I);c 11=0;b(7.x(\'-\')!=-1&&6.1h===\'\'){7=\'\'}t b(7.x(\'-\')!=-1&&6.1h==\'-\'){11=1}b(7.x(\'.\')==-1&&7.l>(6.1d+11)){7=\'\'}t b(7.x(\'.\')>(6.1d+11)){7=\'\'}b(6.o!=\'.\'){7=7.y(\'.\',6.o)}u 1r(7,6)};$.17.18.1n={1l:\'2e\',1h:\'\',R:\',\',o:\'.\',n:\'\',G:\'p\',1d:15,h:0,1H:3,I:\'S\'}})(2t);',62,164,'||||||io|iv||||if|var|||this||mDec||||length|caretPos|aSign|aDec||kdCode|value||else|return|rePaste|setCaret|indexOf|replace|nSign||||inLength|outLength||pSign|function|mRound|selectLength|ii|tRound|charAt|ivRounded|lastIndexOf|opts|val|aSep||keyCode||u00A0|fixId|ivArray|for|dPos||nNeg|charLeft||metadata||preventDefault|fn|autoNumeric|iField|rLength|kpCode|selectionStart|mNum|extend|testPaste|options|aNeg|digitalGroup|iRange|numLeft|aNum|which|defaults|myid|countNum|cDec|autoGroup|chr|selection|document|substr|cmdKey|ivSplit|select|isNaN|reg|numCount|46|36|35|37|39|dGroup|numRight|character|cCode|false|continue|split|eNeg|autoCheck|autoRound|while|true|moveStart|text|createRange|gi|9999|RegExp|new||selectionEnd|focus|break|end||str|allowed|start|odd|Strip|45|each|id|0123456789|48|join|test|keyup|metaKey|bind|Format|86|88|keydown|window|moveEnd|setTimeout|keypress|jQuery|57|fromCharCode|String|collapse|event|67|paste|ctrlKey|createTextRange|change'.split('|'),0,{}));
        var subtotal = <?php echo $row->totalHarga; ?>

        $("#jumlah_bayar").keyup(function () {

            var amount_tendered = parseFloat($(this).val().replace(/[$,]+/g, ''));
            amount_tendered = isNaN(amount_tendered) ? 0 : amount_tendered;
            var change_due = amount_tendered - subtotal;

            // $('#uang_kembali').text(change_due);

            Global.formatNumber("uang_kembali", change_due);


        });
    });
</script>
