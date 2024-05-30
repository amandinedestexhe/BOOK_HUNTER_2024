<!-- Main -->
<div class="container mx-auto flex flex-wrap pt-4 pb-12 text-white">
      <!-- Aside -->
      <?php include_once '../app/views/templates/partials/_aside.php'?>
      <main class="w-full md:w-3/4 p-3">
      <h2 class="text-2xl font-bold mb-4">Popular books</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php echo $content;?>
        </div>
      </main>
</div>