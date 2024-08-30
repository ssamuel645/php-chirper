<?php view('partials/head') ?>
<?php view('partials/nav') ?>
<?php view('partials/banner', compact(['heading'])) ?>

<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
  <div
    class="w-full bg-white border border-gray-200 rounded-lg shadow sm:p-8 d"
  >
    <form
      class="max-w-md mx-auto"
      action="/register"
      method="POST"
    >
      <div class="relative z-0 w-full mb-5 group">
        <input
          type="name"
          name="name"
          id="name"
          class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          value="<?= old('name') ?>"
          placeholder=" "
          required
        />
        <label
          for="name"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
          >Name</label
        >
        <?php if (isset($errors['name'])) : ?>
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
          <?= $errors['name'] ?>
        </p>
        <?php endif?>
      </div>

      <div class="relative z-0 w-full mb-5 group">
        <input
          type="email"
          name="email"
          id="email"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          value="<?= old('email') ?>"
          placeholder=" "
          required
        />
        <label
          for="email"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
          >Email address</label
        >
        <?php if (isset($errors['email'])) : ?>
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
          <?= $errors['email'] ?>
        </p>
        <?php endif?>
      </div>
      <div class="relative z-0 w-full mb-5 group">
        <input
          type="password"
          name="password"
          id="password"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          value="<?= $_POST['password'] ?? '' ?>"
          placeholder=" "
          required
        />
        <label
          for="password"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
          >Password</label
        >
        <?php if (isset($errors['password'])) : ?>
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
          <?= $errors['password'] ?>
        </p>
        <?php endif?>
      </div>
      <div class="relative z-0 w-full mb-5 group">
        <input
          type="password"
          name="repeat_password"
          id="repeat_password"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" "
          required
        />
        <label
          for="repeat_password"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
          >Confirm password</label
        >
        <?php if (isset($errors['repeat_password'])) : ?>
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
          <?= $errors['repeat_password'] ?>
        </p>
        <?php endif?>
      </div>

      <button
        type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      >
        Register
      </button>
    </form>
  </div>
</div>
<?php view('partials/footer'); ?>
