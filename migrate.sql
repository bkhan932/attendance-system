
   INFO  Running migrations.  


   Symfony\Component\ErrorHandler\Error\FatalError 

  Cannot declare class CompanyStructureTables, because the name is already in use

  at database\migrations\2024_02_01_074554_company_organization_context.php:7
      3▕ use Illuminate\Database\Migrations\Migration;
      4▕ use Illuminate\Database\Schema\Blueprint;
      5▕ use Illuminate\Support\Facades\Schema;
      6▕ 
  ➜   7▕ class CompanyStructureTables extends Migration
      8▕ {
      9▕     public function up()
     10▕     {
     11▕         // 1. Company Table


   Whoops\Exception\ErrorException 

  Cannot declare class CompanyStructureTables, because the name is already in use

  at database\migrations\2024_02_01_074554_company_organization_context.php:7
      3▕ use Illuminate\Database\Migrations\Migration;
      4▕ use Illuminate\Database\Schema\Blueprint;
      5▕ use Illuminate\Support\Facades\Schema;
      6▕ 
  ➜   7▕ class CompanyStructureTables extends Migration
      8▕ {
      9▕     public function up()
     10▕     {
     11▕         // 1. Company Table

  1   vendor\filp\whoops\src\Whoops\Run.php:510
      Whoops\Run::handleError()

  2   [internal]:0
      Whoops\Run::handleShutdown()

