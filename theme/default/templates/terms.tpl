<div class="staticHeader">
	<div class="newtopmenunav TopMenuNav nav-collapse in collapse no-mar clearfix">
		<div class="container">
			<ul class="nav row unstyled TopMenuNavList">
				<li class="sitelogo"><a href="{$SITE_BASEURL}"><img width="175" src="{$SITE_LOGO}" alt="siteLogo" title="siteLogo" /></a></li>
				<li class="pull-right borNone loginPop dropdown">
					{if !$smarty.session.user_id}
						<a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown">
							Login <b class="caret"></b>
						</a> 
					{/if}		
					<div class="dropdown-menu span4 offset0">
						<!--<div class="arrowTop"></div>-->
						{if !$smarty.session.user_id}
							<form name="loginform" id="loginform" class="no-mar" method="post" action="">
								<div class="headerDropDownList">
									<div id="error_msglogin"><span class="icon-close"></span></div>
									<div class="row-fluid">
									{*<div class="loginwidth">
										<h2>Login With</h2>
										<label><input type="radio" name="log" id="email_log" onclick="return showdiv('uemail');" checked="checked" value="">Email</label>
										<label><input type="radio" name="log" id="username_log" onclick="return showdiv('uname');">Username</label>
									  </div>*}
										<div id="uemail">
											<input type="text" class="textbox span12" name="user_email" id="user_email" value="{if $smarty.cookies.cookie_userEmail neq ''}{$smarty.cookies.cookie_userEmail}{else}{$smarty.post.user_email}{/if}" placeholder="{$LANG.index_site_email}/{$LANG.index_site_user}"  value=""/>
										</div>
									{*	<div id="uname" style="display:none;">
										<input type="text" class="textbox span12" name="username" id="username" value="{if $smarty.cookies.cookie_userName neq ''}{$smarty.cookies.cookie_userName}{/if}" placeholder="{$LANG.index_site_user}" />
										</div>*}
										<input type="password" class="textbox span12 offset0" name="user_password" id="user_password" value="{if $smarty.cookies.cookie_Password neq ''}{$smarty.cookies.cookie_Password}{else}{$smarty.post.user_password}{/if}" placeholder="{$LANG.index_site_pass}" />
										<div class="clr"></div>	
										<div class="remember">
											<input type="checkbox" name="remember_me" id="remember_me" class="no-mar"  value="Yes" {if $smarty.cookies.cookie_userName && $smarty.cookies.cookie_Password} checked="checked" {elseif $smarty.cookies.cookie_userEmail}checked="checked" {/if} /> {$LANG.index_site_remember}
										</div>
										<a  href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}resetpass/1{else}resetPass.php?forgot=1{/if}" class="forgot">{$LANG.index_site_forgot}?</a>
										<input type="submit" class="loginPopButton" name="login" id="login" value="Login" />
									</div>
								</div>
							</form>
						{*===Facebook Login===*}			
						<div class="marLftRhtLogPop">
                           <input type="hidden" name="facebook_api_value" id="facebook_api_value" value="{$FACEBOOK_API}"/>
							<a onclick="return callFacebookConnect();" class="btn-facebook btn-block">
								<span class="facebook"></span>
								<span class="text">{$LANG.header_login_facebook}</span>
							</a>
						</div>
						{*===Facebook Login Ends===*}
					</div>
				{/if}	
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="container">
		<div class="staticHead">HİZMET KALİTESİ ANLAŞMASI</div>
		<div class="ListContainOuter staticContAlign">
			<h3>HİZMET SÖZLEŞMESİ</h3>
Aşağıdaki sözleşme standart online hizmet sözleşmesidir. Bu sözleşme Co-Location, Kiralık Sunucu, Sanal Sunucu gibi özel servis ve özel kapsamları içermemektedir. Bu hizmetlerde müşterilerimiz ile yazılı sözleşmeler yapılmakta olup, yazılı sözleşmelerdeki şart ve detaylar geçerlidir.<br /><br />

1. Taraflar<br />


2. Konusu<br />


3. Sorumluluklar<br />


4. Süre<br />


5. Ücret<br />


6. Askıya Alınma<br />


7. Fesih<br />


8. İletişim ve Bilgi Adresleri<br />


9. Ücretin Ödenmesinde Temerrüde Düşülmesi<br />


10. Yetkili Mahkeme ve İcra Daireleri<br /><br />
<h3>SÖZLEŞME DETAYLARI</h3>
<h3><b>1. Taraflar</b></h3>
1.1: Bu sözleşme hizmetler bölümünde belirtilen hizmetleri(Hizmetler olarak anılacaktır) sağlayan Hızlı Sayfalar İnternet ve Bilişim Hizmetleri Ticaret Limited Şirketi (Hızlı Sayfalar olarak anılacaktır) ile Yeni müşteri kaydı bölümünde detayları ile belirtilen kişi/kurum(Müşteri olarak anılacaktır) arasında Hızlı Sayfalar'a ait olan http://www.orca.web.tr internet adresinde faaliyet gösteren internet sitesinin(Site olarak anılacaktır) kullanımı ve bu site üzerinden satın alınacak hizmetleri aşağıda belirtilen madde ve koşullar ile yapılacağını belirtir.

1.2: Taraflar iş bu sözleşmede yazılı bilgilerin doğruluğunu beyan, kabul ve taahhüt ederler.
<h3><b>2. Konusu</b></h3>
2.1: İş bu sözleşme müşteri tarafından site üzerindeki işlemlerinde, siparişlerinde, gönderdiği mesajlarında kayıt işleminde vermiş olduğu bilgiler doğrultusunda yapmaya ve yapmamaya izni olan bölümleri, siparişlerinde tercihleri uyarınca alacağı hizmetler karşılığında Hızlı Sayfalar’a ödeyeceği ücretleri düzenleyecektir. Bu hizmet ve işlem açıklamaları aşağıdaki gibidir.
<br />
2.2: Üyelik bilgileri müşteri tarafından üye olunma sırasında girilen bilgilerdir. Bu bilgiler yapılan işlemlerde baz alınacağından müşteri ve üyenin bu bilgileri hatasız eksiksiz ve doğru girdiği varsayılmaktadır.
<h3><b>3. Sorumluluklar</b></h3>
3.1: Hızlı Sayfalar, müşterinin talebi üzerine sipariş olarak ilettiği hizmetleri sağlayacaktır. Tahsilatın başarı ile gerçekleştiği onay mesajı ile Hızlı Sayfalar ilgili ücreti tahsil ettiğini kabul edip söz konusu siparişte belirtilen hizmeti vereceğini taahhüt edecektir.
<br />
3.2: Ödeme şekli, KDV farkları sipariş sırasında çıkartılacak toplam miktar ile belirtilerek müşterinin aylık veya yıllık ödeme tercihlerine göre ödemesi gereken ücretler Hızlı Sayfalar tarafından bildirilecektir.
<br />
3.3: Sipariş kabulü ve işlemlerin onaylanmasından sonra Hızlı Sayfalar, müşteri siparişi detayında bulunan hizmete ilişkin kontrol panel, ftp, sql ve e-mail kullanıcı adları ve şifrelerini müşteriye iletecek ve hizmet başlamış olacaktır. İlgili hesapların ve şifrelerin sorumluluğu müşteriye ait olup bu konulardan doğabilecek zarar ve ziyandan müşteri sorumlu olacaktır.
<br />
3.4: Müşteri aldığı hizmet dahilinde Hızlı Sayfalar tarafından aldığı beyan ve uyarılara uyacağını taahhüt eder. Müşteri, hosting hesabından faydalanırken Hızlı Sayfalar tarafından yayınlanan her türlü ihtar ya da bildirime uymayı beyan, kabul ve taahhüt eder. Müşteri, almış olduğu bulundurma hizmetinde kendisine ücretsiz ve sınırsız olarak verilen hizmetleri yine ücretli ya da ücretsiz ve/veya sınırlı ya da sınırsız olarak üçüncü kişilere dağıtamaz, satamaz.
<br />
3.5: Müşteri hizmet dahilinde sahip olduğu yazılım ve programları kullanarak erişim hakkı bulunmayan dosya veya programlara erişmemeyi, bu tarz bir sorundan dolayı herhangi bir problem yaratmamayı, oluşabilecek sorun ve problemlerde zararı karşılamayı taahhüt eder.
<br />
3.6: Müşteri alan adı, hosting veya aldığı hizmetlerin kullanılması sırasında yürürlükte olan veya sözleşme süresince yürürlülüğe girecek olan vergi, harç ve benzer yükümlülüklerin kendisine ait olduğunu ve karşılayacağını kabul ve taahhüt eder.
<br />
3.7: Müşteri hizmeti dahilinde barındırdığı tüm dosya, döküman ve programlardan, web sitesi ve e-mail hizmetleri ile kullanacağı ve faydalanacağı tüm işlemlerden kendisi sorumlu olduğunu, söz konusu veri, bilgi ve beyanların yasalara aykırılığından doğabilecek tüm hukuki ve cezai sorumluluğu kendisinin karşılayacağını kabul ve taahhüt eder. İş bu konuda doğabilecek sorunlardan Hızlı Sayfalar herhangi bir sorumluluk kabul etmez.
<br />
Hızlı Sayfalar sayfaları gönderilmeden önce gözden geçirmez, doğrulamaz, ciro etmez veya kullanıcı tarafından yapılmış sayfalar için herhangi bir şekilde bir sorumluluk almaz. Hızlı Sayfalar kullanıcı hesaplarını bu ana hatları ihlal ettiği için veya başka bir sebeple veya Hızlı Sayfalar’ın kendi veya kullanıcılarından herhangi birinin işine zararlı olduğuna inandığı için fesih edebilir. Hızlı Sayfalar hukuka aykırılık eden fiileri ve eylemleri öğrendiğinden itibaren müşteriye haber vermeden silmek hakkına sahiptir.
<br />
3.8: Hızlı Sayfalar, sağladığı hizmet içerisinde bulunan müşteri verilerinin hatalı kullanımlarından, veri içeriklerinden, e-mail ile kullanılan tüm verilerden doğabilecek hiç bir maddi veya manevi zarardan sorumlu tutulamaz. Bu verilerin yedekleme ve saklama yükümlükleri müşteriye aittir. Hızlı Sayfalar müşterinin tüm verilerini düzenli bir biçimde yedekleme ve bakım işlemine tabi tutacaktır. Buna rağmen Hızlı Sayfalar hizmetlerinde meydana gelebilecek kesinti veya veri kaybından dolayı oluşabilecek hatalardan, zarardan ve ziyandan Hızlı Sayfalar sorumlu değildir. Verilerin yedeklenmesi sözleşme metninde aksi belirtilmediği sürece müşterinin sorumluluğundadır.
<br />
3.9: Hızlı Sayfalar, müşteri tarafından sipariş verilmiş ve ödemesi sorunsuz olarak gerçekleştirilmiş alan adı (domain name) tescil işlemlerini yürütecektir. Tescil edilen ve sipariş ile kabul edilen tescil talebi ile ücreti ödenen alan adının sahibi müşteridir. Hızlı Sayfalar bu konuda müşterinin talepleri doğrultusunda alan adı üzerinde işlem yapabilecektir. Müşteri tarafından gelen, alan adı üzerinde düzenleme, değişiklik ve transfer taleplerini en kısa sürede gerçekleştirecektir. Tarafımızdan tescil edilen alan adlarının (com, net, org, ...) The Directi Group ve OnlineNIC firmalarına transfer işlemi kesinlikle gerçekleştirilmemektedir.
<br />
3.10: Hızlı Sayfalar, aylık ödemeli siparişlerin tamamında müşteri tarafından belirtilecek Paypal hesap bilgileri ve kredi kartı bilgilerini, kullanmakta olduğu sistem üzerine kaydederek ödemelerin aylık olarak tahsilatını sağlayacaktır. Aylık ödemelerin gecikmesi durumunda hizmetin durdurulması hakkını saklı tutmaktadır.
<br />
3.11: Hızlı Sayfalar, müşteriye ait yedeklerin düzenli tutulması için gerekli özeni ve ehemmiyeti gösterecektir, fakat bu konuda yaşanabilecek sorunlardan dolayı müşterinin uğrayacağı veri kayıplarından sorumlu tutulamaz, müşteri kendi verilerini düzenli olarak kaydetmekle yükümlüdür.
<br />
3.12: Hızlı Sayfalar, süresi dolmuş alan adı, hosting, veya sunduğu diğer hizmetleri süre bitiminden sonra durdurma, hizmeti tamamen iptal etme hakkını saklı tutmaktadır. Süresi dolmuş veya ödemesi sağlanmamış hizmetlerin iptalinden sonra herhangi bir veri kaydı tutma yükümlülüğü bulunmamaktadır.
<br />
3.13: Hızlı Sayfalar, Alan adı Tescil hizmetlerinde birebir olarak ICANN ve alan adı ana üreticisi pozisyonunda yer alan REGISTRAR şirketlerin şartlarına uymaktadır. Bu konuda tüm sorumluluklar ve süreçler REGISTRAR şirketlerin şartları olarak geçerlidir. Alan adlarının tescil süreçleri yazılım sistemleri tarafından yönetilir, bu yazılımlar Hızlı Sayfalar ve Registrar şirketler üzerinde çalışmaktadır. Bu çalışma sırasında yaşanabilecek arıza veya erişim sorunlarından dolayı tescil, güncelleme, düzenleme, değişiklik, silme gibi süreçlerde yaşanabilecek hatalarda Müşteri tüm sürecin kontrolünden sorumludur.
<br />
3.14: Hızlı Sayfalar, Alan adı Tescil Hizmetlerinde, whois bilgisi değiştirme ve doğruluğunun sorumluluğu, alan adı tescil şifresi sorumluluğu, transfer kilidi sorumluluğu müşteriye aittir. Bu bilgi Hızlı Sayfalar kontrol paneli üzerinden planlı bakım ve %0.1 altında kalan süreçte yaşanabilecek arıza durumları haricinde 7/24 müşteri tarafından değiştirilebilmektedir.
<br />
3.15: Hızlı Sayfalar, Alan adı Tescil Hizmetlerinde sağlama şartlarını ve fiyatlarını bilgi vermeksizin değiştirme hakkına sahiptir. Bu düzenleme yıllık ödeme yapılan alan adlarının servis yenilenmesi sürecinden sonra yürürlüğe girecek olup servis yenilenmesi sırasında güncel fiyat ve şartlar açık ve eksiksiz olarak belirtilmektedir. Müşteri yenileme yapmak istemez ise veya yenilemeyi farklı bir şirket üzerinden yapmak isterse bu durumda Registrar şirketlerin ve ICANN'in koymuş olduğu kurallar çerçevesinde işlem yapma hakkına sahiptir.
<br />
3.16: Hızlı Sayfalar, Alan adı hizmetlerinde yenileme süreçlerini zamanında gerçekleştirmeyen müşteriler için alan adlarını süre bitimi itibari ile askıya almaktadır. Bu askı süreci, alan adının üreticisinin belirlediği zamana göre değişir. Bu süre zarfında alan adını satın alan ana müşteri yıllık yenileme bedelini ödeyerek alan adını yenileyebilir ve tekrar geri alarak kullanım hakkını kazanabilir. Alan adı bu süre içerisinde yenilenmediği durumlarda alan REDEMPTION PERIOD’a düşecektir. Bu süreçte alan adının hakkı artık müşteriden çıkmış ve bizim şirketimizin ve registrar şirketin insiyatifine bırakılmıştır. Bu süreçte alan adını Hızlı Sayfalar veya Registrar farklı bir şirkete satma hakkına sahiptir. Redemption period sürecinde alan adını tekrardan almak isteyen eski müşteri veya yeni almak isteyen yeni müşteri değeri alan adı üreticisine göre değişmekle birlikte ortalama 130 USD olan ceza ücretini ödeyerek geri alabilir. Redemption period sonrasında alınmayan alan adlarında artık süreç Registrar'ın insiyatifine geçmekte olup bu süreç sonrasında alan adının Hızlı Sayfalar üzerinden geri alınması mümkün olmamaktadır.
<br />
3.17: Hızlı Sayfalar, Alan adı hizmetleri satılan bir ürün değildir. Aksine ücreti ödendiği süre boyunca kullanım hakkı alınan bir hizmet şeklidir. Bu nedenle alan adının bitiş süreleri içerisinde ücretinin ödenmemesi durumunda bu hak başka bir kişiye geçebilir.
<br />
3.18: Hızlı Sayfalar, Toplu mail gönderimi ya da İsteksiz mail iletimi (spam e-mail) hizmeti sunmamaktadır. Sağlamış olduğu hizmetler üzerinden bu tarz gönderimler yapılamaz. Bu tarz gönderimlerin tespitinde, sırasıyla 12, 24, 48 ve 72 saat süre ile mail gönderim protokolü (SMTP) erişimini bloklar. Gönderimin bir kez daha tekrarlanması durumunda, SMTP erişimi; hizmet için bir daha açılmamak üzere engeller.
<h3><b>4. Süre  </b></h3>
4.1: İş bu sözleşme sipariş ve ödeme işlemlerinin internet ortamından Hızlı Sayfalar’a iletilmesi ile birlikte tarafların belirtilen hak ve yükümlülükleri başlar.
<br />
4.2: Sözleşme süresi müşterinin ilgili hizmet için sipariş sırasında seçmiş olduğu ödeme periyodu kadardır. Sipariş onaylanıp, hizmet aktif edildikten sonra hizmet iptali ve bedel iadesi talep edilemez.
<br />
4.3: Taraflar sözleşmenin sona ermesinden 10 iş günü öncesine kadar, sözleşmenin süre sonunda sona ereceğini ihtar etmemişler ise sözleşme aynı şart ve hükümler ile önceki sözleşme süresi kadar uzar. (Hızlı Sayfalar’ın ücrette meydana gelebilecek değişiklikleri Müşteri’ye yansıtma hakkı saklıdır.)<br />
<h3><b>5. Ücret</b></h3>
5.1: İş bu sözleşmede belirtilen hizmetler karşılığı olarak ödenecek ücret sipariş işlemi sırasında belirtilen miktar kadardır. Belirtilen ücretlere KDV sonradan dâhil ederek hesaplanır ve müşteriye gösterilerek tahsilat gerçekleşir
<br />
5.2: Hızlı Sayfalar önceden haber vermeksizin fiyatlar ve tarifeler üzerinde ileriye dönük olarak değişiklik yapma hakkını saklı tutar. Müşteri iş bu değişiklikler konusunda şimdiden oluşabilecek değişiklikleri kabul, beyan ve taahhüt eder.
<br />
5.3: Ücret fatura tarihindeki Garanti Bankası efektif satış kuru üzerinden Türk Lirasına çevrilerek ödenir.
<br />
5.4: Ücret, ilgili ürün satış sayfalarında belirtilmediği ve müşteri ile yapılan özel bir sözleşme olmadığı sürece, fatura kesim tarihinden itibaren 5. iş günü sonuna kadar, sipariş işlemi sırasında Paypal veya kredi kartı ile ödeme talimatı var ise Paypal veya kredi kartı hesabından, herhangi bir ödeme talimatı yok ise iletişim adresinde belirtilen banka hesap numaralarına veya Hızlı Sayfalar’a elden ödemekle yükümlüdür.
<br />
5.5: Ödemenin gecikmesi durumunda Hızlı Sayfalar kur farkı faturası kesme hakkını saklı tutar.
<br />
5.6: Hızlı Sayfalar, müşteri ödeme işlemini tamamlayıncaya kadar ilgili hizmeti kapatma, açma hakkını saklı tutar.
<br />
5.7: Aylık ödemeli siparişlerde, ödemenin kredi kartı ile yapılması durumunda müşteri kredi kartı bilgileri otomatik ödeme kapsamına alınır. Müşteri bu işlemleri <a href="http://www.orca.web.tr/hesaplar">http://www.orca.web.tr/hesaplar</a> adresindeki "Hesabım" sayfasından ulaşarak değiştirme, iptal etme işlemlerini yapma hakkına sahiptir.
<h3><b>6. Askıya Alınma</b></h3>
6.1: Ödeme konusunda problem yaşanması, kredi kartı ile ödeme talimatı olan müşterilerde provizyon sorunları veya hüküm ve yükümlülükler ile ilgili maddelerden dolayı Hızlı Sayfalar, müşteriye verilen hizmetlerin tümünü, e-mail, web, ftp hesaplarının tamamını durdurma hakkını saklı tutar.
<br />
6.2: Bu durumun devam süresince müşteri adına e-mail, web, ftp erişimleri yapılamaz ve e-mail hesapları engellenerek gelen e-mailler geri çevrilir.<br />
<h3><b>7. Fesih</b></h3>
7.1: Müşteri iş bu sözleşmenin herhangi bir maddesine aykırı davranarak sorumluluklarını ve taahhütlerini yerine getirmediği takdirde ya da iş bu sözleşmenin ön yüzünde beyan ettiği bilgilerin doğru olmadığının tespiti halinde, yukarıda belirtilen sözleşmeyi askıya alma halinin 7 günden fazla devam etmesi halinde, Hızlı Sayfalar hiç bir ihtar ve ihbara gerek kalmaksızın sözleşmeyi tek taraflı olarak fesih etme hakkına sahiptir.
<br />
7.2: Bu şekilde gerçekleşecek fesih sonrasında müşteri; kalan süreye bakılmaksızın ödemiş olduğu son sözleşme ücretini geri isteyemeyeceğini, fesih tarihinde yürürlükte olan emsal sözleşme bedelinin 5 katı ticari cezai tazminat ödemeyi beyan, kabul ve taahhüt eder.
<br />
7.3: Müşteri hiç bir gerekçe göstermeksizin sözleşme normal süre ile sona ermeden 10 gün önce yazılı olarak ihtar etmek şartı ile iş bu sözleşmeyi süresi sonunda fesih etme hakkına sahiptir.
<br />
7.4: Sözleşmenin ve/veya hizmetin sona erme süresinden önce müşteri tarafından fesih edilmesi ya da iptali halinde, fesih tarihinden sözleşme/hizmet sonuna kadar olan sürenin hizmet bedelini peşin olarak ödemeyi beyan, kabul ve taahhüt eder.
<h3><b>8. İletişim ve Bilgi Adresleri</b></h3>
8.1: Taraflar konusu sözleşmeden kaynaklanan her türlü tebligat için taraflar sipariş adresinde belirtilen posta adreslerini yasal ikametgâh olarak kabul, beyan ve taahhüt etmişlerdir.
<br />
8.2: Bu adreslere yapılan her türlü tebligat tarafların eline ulaşmasa bile tebliğ edilmiş kabul edilecektir. İş bu adreslere ait değişiklikler diğer tarafa yazılı olarak bildirilmedikçe eski adresler geçerli olacaktır.
<br />
8.3: Hızlı Sayfalar sözleşme süresi içinde Müşteri'ye tahsis ettiği elektronik posta adresine mesaj, bilgi, yazı, ihtar, ödeme bildirimi, hesap hareket çizelgesi, hesap ekstresi gönderebilir. Müşteri söz konusu elektronik iletilerin alınmadığı ya da kendisine ulaşmadığı iddiasında bulunamayacağı gibi, söz konusu iletilerin gönderildikleri tarihten 1 gün sonra yasal anlamda tebliğ etmiş sayılacağını beyan, kabul ve taahhüt eder.<br />
<h3><b>9. Ücretin Ödenmesinde Temerrüde Düşülmesi</b></h3>
9.1: Müşteri, aldığı hizmetlere karşılık başvuru tarihini takip eden 7 gün içinde ödeme gerçekleştirmediği takdirde temerrüde düşmüş sayılır. Bu durumda Hızlı Sayfalar kur farkı faturası kesebileceği gibi dilerse fatura tarihinden itibaren aylık %15 gecikme faizi talep edebilir. Müşteri bu gecikme faizi ve kur farkı faturasını ödemeyi beyan ve kabul eder.
<br />
9.2: Müşteri, iş bu sözleşmeden doğan her tür alacak için Hızlı Sayfalar’ın dava yada icra takibi açması halinde de aylık %15 gecikme faizi, bakiye borç miktarının %50'si kadar cezai şart, %10'u Avukatlık Ücreti ve diğer tüm yasal giderleri ödemeyi beyan, kabul ve taahhüt eder.
<br />
9.3: Müşteri, iş bu sözleşmeden doğan alacaklarının tahsili için yasal mercilere İhtiyati Haciz ve İhtiyati tedbir için başvurması halinde Hızlı Sayfalar’ın teminatsız İhtiyati Haciz ve İhtiyati Tedbir kararı almaya yetkili olduğunu ancak buna rağmen Mahkemelerce teminat istendiğinde, Bankalardan alınacak teminat mektuplarından doğacak komisyon ve her türlü ücretin kendileri tarafından ödeneceğini ve bu konulara hiçbir itirazda bulunmayacağını beyan, kabul ve taahhüt eder.
<h3><b>10. Yetkili Mahkeme ve İcra Daireleri</b></h3>
10.1: İş bu sözleşme, bununla birlikte 10 madde ve alt başlıklardan ibaret olup, taraflarca okunup anlaşılarak imza altına alınmıştır. (Siparişin internet ortamında Hızlı Sayfalar’a onaylanıp gönderilmesi ile gerçekleşmiş kabul edilir). Hızlı Sayfalar gerek gördüğü takdirde yeni maddeler ve/veya alt başlıklar ekleyebilir, çıkartabilir ya da maddeler üzerinde değişiklik yapabilir. Müşteri Hızlı Sayfalar’ın kendisine sözleşmenin yeni halini elektronik posta ile gönderdikten 10 iş günü içerisinde itiraz etmediği müddetçe sözleşmenin yeni halini kabul etmiş olacağını beyan, kabul ve taahhüt eder.
<br />
10.2: İş bu sözleşmenin uygulanması sırasında doğacak her türlü uyuşmazlıkların çözümünde Ankara Mahkemeleri ve İcra Daireleri yetkilidir.<br /><br />
		</div>
	</div>
</div>
<div class="space"></div>