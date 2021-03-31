<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadiusTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freecdr', function (Blueprint $table) {
            $table->bigInteger('radacctid')->nullable(false)->autoIncrement();
            $table->string('acctsessionid',64)->nullable(false)->default('');
            $table->string('acctuniqueid',32)->nullable(false)->default('');
            $table->string('nasipaddress',15)->nullable(false)->default('');
            $table->string('netfwdflowinrealm',255)->nullable(false)->default('');
            $table->string('netfwdflowinsrcaddr', 15)->nullable(false)->default('');
            $table->integer('netfwdflowinsrcport')->nullable(false)->default(0);
            $table->string('netfwdflowindstaddr',15)->nullable(false)->default('');
            $table->integer('netfwdflowindstport')->nullable(false)->default('0');
            $table->string('netfwdflowoutrealm',255)->nullable(false)->default('');
            $table->string('netfwdflowoutsrcaddr',15)->nullable(false)->default('');
            $table->integer('netfwdflowoutsrcport')->nullable(false)->default('0');
            $table->string('netfwdflowoutdstaddr',15)->nullable(false)->default('');
            $table->integer('netfwdflowoutdstport')->nullable(false)->default('0');
            $table->string('netbwdflowinrealm',255)->nullable(false)->default('');
            $table->string('netbwdflowinsrcaddr',15)->nullable(false)->default('');
            $table->integer('netbwdflowinsrcport')->nullable(false)->default('0');
            $table->string('netbwdflowindstaddr',15)->nullable(false)->default('');
            $table->integer('netbwdflowindstport')->nullable(false)->default('0');
            $table->string('netbwdflowoutrealm',255)->nullable(false)->default('');
            $table->string('netbwdflowoutsrcaddr',15)->nullable(false)->default('');
            $table->integer('netbwdflowoutsrcport')->nullable(false)->default('0');
            $table->string('netbwdflowoutdstaddr',15)->nullable(false)->default('');
            $table->integer('netbwdflowoutdstport')->nullable(false)->default('0');
            $table->string('netfwdflowmediatype',255)->nullable(false)->default('');
            $table->integer('netfwdflowptime')->nullable(false)->default('0');
            $table->integer('netfwdoctets')->nullable(false)->default('0');
            $table->integer('netfwdpackets')->nullable(false)->default('0');
            $table->integer('netfwdrtcppacketslost')->nullable(false)->default('0');
            $table->integer('netfwdrtcpavgjitter')->nullable(false)->default('0');
            $table->integer('netfwdrtpavglatency')->nullable(false)->default('0');
            $table->integer('netfwdrtcpmaxjitter')->nullable(false)->default('0');
            $table->integer('netfwdrtpmaxlatency')->nullable(false)->default('0');
            $table->integer('netfwdrtppacketslost')->nullable(false)->default('0');
            $table->integer('netfwdrtpavgjitter')->nullable(false)->default('0');
            $table->integer('netfwdrtpmaxjitter')->nullable(false)->default('0');
            $table->integer('netbwdmaxpacketoutage')->nullable(false)->default('0');
            $table->integer('netbwdoctets')->nullable(false)->default('0');
            $table->integer('netbwdpackets')->nullable(false)->default('0');
            $table->integer('netbwdrtcppacketslost')->nullable(false)->default('0');
            $table->integer('netbwdrtcpavgjitter')->nullable(false)->default('0');
            $table->integer('netbwdrtpavglatency')->nullable(false)->default('0');
            $table->integer('netbwdrtcpmaxjitter')->nullable(false)->default('0');
            $table->integer('netbwdrtpmaxlatency')->nullable(false)->default('0');
            $table->integer('netbwdrtppacketslost')->nullable(false)->default('0');
            $table->integer('netbwdrtpavgjitter')->nullable(false)->default('0');
            $table->integer('netbwdrtpmaxjitter')->nullable(false)->default('0');
            $table->integer('netrtppacketsdiscarded')->nullable(false)->default('0');
            $table->integer('netsessioningresscallid')->nullable(false)->default('65535');
            $table->integer('netsessionegresscallid')->nullable(false)->default('65535');
            $table->integer('netsessiongenericid')->nullable(false)->default('0');
            $table->integer('netroutingtablenumber')->nullable(false)->default('0');
            $table->integer('netingresssignalinggroup')->nullable(false)->default('0');
            $table->integer('netegresssignalinggroup')->nullable(false)->default('0');
            $table->string('netprimaryroutingnumber',255)->nullable(false)->default('');
            $table->string('netegressfinalroutingnum',255)->nullable(false)->default('');
            $table->integer('netingresschannelnumber')->nullable(false)->default('0');
            $table->integer('netegresschannelnumber')->nullable(false)->default('0');
            $table->integer('netcalltype')->nullable(false)->default('0');
            $table->integer('netcallorigin')->nullable(false)->default('0');
            $table->string('netcallingnumber',255)->nullable(false)->default('');
            $table->string('netcallednumber',255)->nullable(false)->default('');
            $table->string('netcallingname',255)->nullable(false)->default('');
            $table->integer('netdisconnectcause')->nullable(false)->default('0');
            $table->integer('netabortcause')->nullable(false)->default('0');
            $table->string('netingresschannelid',255)->nullable(false)->default('');
            $table->string('netegresschannelid',255)->nullable(false)->default('');
            $table->string('netcallpriority',255)->nullable(false)->default('');
            $table->string('netrecordingtype',255)->nullable(false)->default('');
            $table->string('netrecordingleg',255)->nullable(false)->default('');
            $table->string('netcallnumbertype',255)->nullable(false)->default('1');
            $table->string('netcallplan',255)->nullable(false)->default('1');
            $table->string('netoriginalcallednumber',255)->nullable(false)->default('');
            $table->string('netoriginalcalledtype',255)->nullable(false)->default('1');
            $table->string('netoriginalcalledplan',255)->nullable(false)->default('1');
            $table->string('netcalledname',255)->nullable(false)->default('');
            $table->string('netnamespace',255)->nullable(false)->default('3');
            $table->string('netprecedence',255)->nullable(false)->default('1');
            $table->string('netpresentation',255)->nullable(false)->default('1');
            $table->string('netscreening',255)->nullable(false)->default('1');
            $table->string('nettransfercapability',255)->nullable(false)->default('1');
            $table->string('nettransfermode',255)->nullable(false)->default('1');
            $table->string('nettransferrate',255)->nullable(false)->default('1');
            $table->string('netuserrate',255)->nullable(false)->default('1');
            $table->string('netsetuptime',255)->nullable(false)->default('');
            $table->string('netalerttime',255)->nullable(false)->default('');
            $table->string('netconnecttime',255)->nullable(false)->default('');
            $table->string('netdisconnecttime',255)->nullable(false)->default('');
            $table->string('netinboundseizetime',255)->nullable(false)->default('');
            $table->string('netoutboundseizetime',255)->nullable(false)->default('');
            $table->integer('netcallduration')->nullable(false)->default('0');
            $table->integer('netpostdialdelay')->nullable(false)->default('0');
            $table->integer('netdisconnectinitiator')->nullable(false)->default('0');
            $table->string('netpassertedid',255)->nullable(false)->default('');
            $table->string('netsipdiversion',255)->nullable(false)->default('');
            $table->string('netingresslocaladdr',255)->nullable(false)->default('');
            $table->string('netingressremoteaddr',255)->nullable(false)->default('');
            $table->string('netegresslocaladdr',255)->nullable(false)->default('');
            $table->string('netegressremoteaddr',255)->nullable(false)->default('');
            $table->integer('netingressnetinterfaceid')->nullable(false)->default('0');
            $table->integer('netegressnetinterfaceid')->nullable(false)->default('0');
            $table->string('netrefercalltransferid',255)->nullable(false)->default('');
            $table->string('netsessionforkedcallid',255)->nullable(false)->default('');
            $table->string('netredirectnumber',255)->nullable(false)->default('');
            $table->string('netredirectipaddress',255)->nullable(false)->default('');
            $table->string('netsessioningressrealm',255)->nullable(false)->default('');
            $table->string('netsessionegressrealm',255)->nullable(false)->default('');
            $table->integer('netingresssignalingportnum')->nullable(false)->default('0');
            $table->integer('netegresssignalingportnum')->nullable(false)->default('0');
            $table->integer('nettransporttype')->nullable(false)->default('0');
            $table->string('netppreferredid',255)->nullable(false)->default('');
            $table->integer('netingsignalingremportnum')->nullable(false)->default('0');
            $table->integer('netegsignalingremportnum')->nullable(false)->default('0');
            $table->string('netingresssipcallid',255)->nullable(false)->default('');
            $table->string('netegresssipcallid',255)->nullable(false)->default('');
            $table->string('netfirmwareversion',255)->nullable(false)->default('');
            $table->string('netlocaltimezone',255)->nullable(false)->default('');
            $table->string('netgwid',255)->nullable(false)->default('');
            $table->string('nettimeandday',255)->nullable(false)->default('');
            $table->string('netlogtime',255)->nullable(false)->default('');
            $table->string('netsiprecordingrtprxipaddr',255)->nullable(false)->default('');
            $table->string('netsiprecordingrtptxipaddr',255)->nullable(false)->default('');
            $table->integer('netrxpacketsent')->nullable(false)->default('0');
            $table->integer('netrxoctetsent')->nullable(false)->default('0');
            $table->integer('netrxpacketlost')->nullable(false)->default('0');
            $table->integer('nettxpacketsent')->nullable(false)->default('0');
            $table->integer('nettxoctetsent')->nullable(false)->default('0');
            $table->integer('nettxpacketlost')->nullable(false)->default('0');
            $table->unique('acctuniqueid');
            $table->index('acctsessionid');
        });
        Schema::create('radacct', function (Blueprint $table) {
            $table->bigInteger('radacctid')->nullable(false)->autoIncrement();
            $table->string('acctsessionid',64)->nullable(false)->default('0');
            $table->string('acctuniqueid',32)->nullable(false)->default('0');
            $table->string('username',64)->nullable(false)->default('0');
            $table->string('realm',64)->default('');
            $table->string('nasipaddress',15)->nullable(false)->default('0');
            $table->string('nasportid',32)->nullable(true);
            $table->string('nasporttype',32)->nullable(true);
            $table->dateTime('acctstarttime')->nullable(true);
            $table->dateTime('acctupdatetime')->nullable(true);
            $table->dateTime('acctstoptime')->nullable(true);
            $table->integer('acctinterval')->nullable(true);
            $table->unsignedInteger('acctsessiontime')->nullable(true);
            $table->string('acctauthentic',32)->nullable(true);
            $table->string('connectinfo_start',50)->nullable(true);
            $table->string('connectinfo_stop',50)->nullable(true);
            $table->bigInteger('acctinputoctets')->nullable(true);
            $table->bigInteger('acctoutputoctets')->nullable(true);
            $table->string('calledstationid',50)->nullable(false)->default('0');
            $table->string('callingstationid',50)->nullable(false)->default('0');
            $table->string('acctterminatecause',32)->nullable(false)->default('0');
            $table->string('servicetype',32)->nullable(true);
            $table->string('framedprotocol',32)->nullable(true);
            $table->string('framedipaddress',15)->nullable(false)->default('0');
            $table->string('framedipv6address',45)->nullable(false)->default('0');
            $table->string('framedipv6prefix',45)->nullable(false)->default('0');
            $table->string('framedinterfaceid',44)->nullable(false)->default('0');
            $table->string('delegatedipv6prefix',45)->nullable(false)->default('0');
            $table->unique('acctuniqueid');
            $table->index('username');
            $table->index('framedipaddress');
            $table->index('framedipv6address');
            $table->index('framedipv6prefix');
            $table->index('framedinterfaceid');
            $table->index('delegatedipv6prefix');
            $table->index('acctsessionid');
            $table->index('acctsessiontime');
            $table->index('acctstarttime');
            $table->index('acctinterval');
            $table->index('acctstoptime');
            $table->index('nasipaddress');
        });
          
          #
          # Table structure for table 'radcheck'
          #
        Schema::create('radcheck', function (Blueprint $table) {        
            $table->unsignedInteger('id')->nullable(false)->autoIncrement();
            $table->string('username',64)->nullable(false)->default('0');
            $table->string('attribute',64) ->nullable(false)->default('0');
            $table->string('op',2)->nullable(false)->default('==');
            $table->string('value',253)->nullable(false)->default('0');
            $table->index([DB::raw('username(32)')]);
        });
          
          #
          # Table structure for table 'radgroupcheck'
          #
        Schema::create('radgroupcheck', function (Blueprint $table) {        
            $table->integer('id')->nullable(false)->autoIncrement();
            $table->string('groupname',64)->nullable(false)->default('0');
            $table->string('attribute',64) ->nullable(false)->default('0');
            $table->string('op',2)->nullable(false)->default('==');
            $table->string('value',253) ->nullable(false)->default('0');
            $table->index([DB::raw('groupname(32)')]);
        });
          
          #
          # Table structure for table 'radgroupreply'
          #
        Schema::create('radgroupreply', function (Blueprint $table) {          
            $table->integer('id')->nullable(false)->autoIncrement();
            $table->string('groupname',64)->nullable(false)->default('0');
            $table->string('attribute',64)->nullable(false)->default('0');
            $table->string('op',2)->nullable(false)->default('=');
            $table->string('value',253) ->nullable(false)->default('0');
            $table->index([DB::raw('groupname(32)')]);
        });
          
          #
          # Table structure for table 'radreply'
          #
        Schema::create('radreply', function (Blueprint $table) {          
            $table->integer('id')->nullable(false)->autoIncrement();
            $table->string('username',64)->nullable(false)->default('0');
            $table->string('attribute',64)->nullable(false)->default('0');
            $table->string('op',2)->nullable(false)->default('=');
            $table->string('value',253)->nullable(false)->default('0');
            $table->index([DB::raw('username(32)')]);
        });
          
          
          #
          # Table structure for table 'radusergroup'
          #
        Schema::create('radusergroup', function (Blueprint $table) {          
            $table->integer('id')->nullable(false)->autoIncrement();
            $table->string('username',64)->nullable(false)->default('0');
            $table->string('groupname',64)->nullable(false)->default('0');
            $table->integer('priority')->nullable(false)->default('1');
            $table->index([DB::raw('username(32)')]);
        });
          
          #
          # Table structure for table 'radpostauth'
          #
          # Note: MySQL versions since 5.6.4 support fractional precision timestamps
          #        which we use here. Replace the authdate definition with the following
          #        if your software is too old:
          #
          #   authdate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
          #
        Schema::create('radpostauth', function (Blueprint $table) {        
            $table->integer('id')->nullable(false)->autoIncrement();
            $table->string('username',64)->nullable(false)->default('0');
            $table->string('pass',64)->nullable(false)->default('0');
            $table->string('reply',32)->nullable(false)->default('0');
            $table->timestamp('authdate',6)->nullable(false)->useCurrent()->useCurrentOnUpdate();
            $table->index([DB::raw('username(32)')]);
        });
          
          #
          # Table structure for table 'nas'
          #
        Schema::create('nas', function (Blueprint $table) {        
            $table->integer('id')->nullable(false)->autoIncrement();
            $table->string('nasname',128)->nullable(false);
            $table->string(' shortname',32);
            $table->string('type',30)->default('other');
            $table->integer('ports');
            $table->string('secret',60)->nullable(false)->default('secret');
            $table->string('server',64);
            $table->string('community',50);
            $table->string('description',200)->default('RADIUS Client');
            $table->index('nasname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freecdr');
        Schema::dropIfExists('radacct');
        Schema::dropIfExists('radcheck');
        Schema::dropIfExists('radgroupcheck');
        Schema::dropIfExists('radgroupreply');
        Schema::dropIfExists('radreply');
        Schema::dropIfExists('radusergroup');
        Schema::dropIfExists('radpostauth');
        Schema::dropIfExists('nas');
    }
}
