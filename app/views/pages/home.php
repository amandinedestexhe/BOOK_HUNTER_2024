
<!-- 3MOST POPULAR BOOKS -->
<h2 class="text-2xl font-bold mb-4">Popular books</h2>
<?php include '../app/views/books/_index.php'; ?>       

<!-- 3MOST POPULAR AUTHORS -->
<h2 class="text-2xl font-bold mt-8 mb-4">Popular authors</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <?php foreach($authors as $author) : ?>
          <article class="bg-gray-800 rounded-lg overflow-hidden shadow-lg">
            <img
              class="w-full h-48 object-cover"
              src="<?php echo $author['picture']; ?>"
              alt="<?php echo $author['firstname']; ?> <?php echo $author['lastname']; ?>"
            />
            <div class="p-4">
              <h3 class="text-xl font-bold mb-2">
                <?php echo $author['firstname']; ?> <?php echo $author['lastname']; ?>
              </h3>
              <div class="flex items-center mb-2">
                <span class="text-yellow-500 mr-1"
                  ><i class="fas fa-star"></i
                ></span>
                <span>8.9</span>
              </div>
              <p class="text-gray-400">
              <?php echo $author['biography']; ?>
                
              </p>
              <a
                href="author.html"
                class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
              >
                More details
              </a>
            </div>
          </article>
          <?php endforeach; ?>
        
        </div>
      </main>
    </div>

   