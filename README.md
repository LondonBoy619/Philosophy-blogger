
<a name="readme-top"></a>

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<div align="center">

<h3 align="center">Philosophy</h3>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

Philosophy is a blogger originally made with PHP, and now remade with Laravel and with nicer UI.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With

* [![Laravel][Laravel.com]][Laravel-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>





### Prerequisites

* npm
* XAMPP v3 - or any version with PHP 8.
* MySql Server - you could use the one embedded with XAMPP.
* PhpMyAdmin "Optional" - can be used to make db management easier, alse embedded with XAMPP.

### Installation

1. Make sure you installed all prerequisites

2. Clone the repo
   ```sh
   git clone https://github.com/LondonBoy619/Philosophy-Blogger.git
   ```
3. Install NPM packages
   ```sh
   npm install
   ```
4. Launch XAMPP and start Apache and MySql servers

5. Enter your DB details in `.env`
   ```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=*Database name in MySql*
    DB_USERNAME=*Database username in MySql*
    DB_PASSWORD=*Database password*
   ```
6. Run migrations and factories
   ```sh
   php artisan migrate
   ```
6.5 Run factories for seeding users and posts table "Optional"
    ```sh
    php artisan migrate:fresh --seed
    ```

7. Run the following SQL on your database to insert 'cats' table info
   ```sql
   INSERT INTO `cats` (`id`, `name`, `slug`, 
   `created_at`, `updated_at`) VALUES
   (1, 'Texts', 'texts', NULL, NULL),
   (2, 'Physical Health', 'physical-health', NULL, NULL),
   (3, 'Podcasts', 'podcasts', NULL, NULL),
   (4, 'Tech', 'tech', NULL, NULL);
   ```
8. Serve the app
   ```sh
   php artisan serve
   ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- ROADMAP -->
## Roadmap

- [Done] Create a functional posts system (CRUD)
- [Done] Create a functional users system (CRUD, management)
- [Upcoming] Create dashboards
    - [Upcoming] Admin dashboard
    - [Upcoming] Author dashboard
- [Upcoming] Easy post reviewing system w/Telegram bot

See the [open issues](https://github.com/LondonBoy619/Philosophy-Blogger/issues) for a full list of proposed features (and known issues).

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/Feature name`)
3. Commit your Changes (`git commit -m 'Add some Feature name'`)
4. Push to the Branch (`git push origin feature/Feature name`)
5. Open a Pull Request

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- LICENSE -->
## License

Distributed under the MIT License.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Your Name - [@LinkedIn](https://www.linkedin.com/in/mohammed-jamal-2aaba8203/) - london619boy@gmail.com

Project Link: [https://github.com/LondonBoy619/Philosophy-Blogger](https://github.com/LondonBoy619/Philosophy-Blogger)

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
[contributors-shield]: https://img.shields.io/github/contributors/LondonBoy619/Philosophy-Blogger.svg?style=for-the-badge
[contributors-url]: https://github.com/LondonBoy619/Philosophy-Blogger/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/LondonBoy619/Philosophy-Blogger.svg?style=for-the-badge
[forks-url]: https://github.com/LondonBoy619/Philosophy-Blogger/network/members
[stars-shield]: https://img.shields.io/github/stars/LondonBoy619/Philosophy-Blogger.svg?style=for-the-badge
[stars-url]: https://github.com/LondonBoy619/Philosophy-Blogger/stargazers
[issues-shield]: https://img.shields.io/github/issues/LondonBoy619/Philosophy-Blogger.svg?style=for-the-badge
[issues-url]: https://github.com/LondonBoy619/Philosophy-Blogger/issues
[license-shield]: https://img.shields.io/github/license/LondonBoy619/Philosophy-Blogger.svg?style=for-the-badge
[license-url]: https://github.com/LondonBoy619/Philosophy-Blogger/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/mohammed-jamal-2aaba8203/
[product-screenshot]: images/screenshot.png
[Next.js]: https://img.shields.io/badge/next.js-000000?style=for-the-badge&logo=nextdotjs&logoColor=white
[Next-url]: https://nextjs.org/
[React.js]: https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB
[React-url]: https://reactjs.org/
[Vue.js]: https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D
[Vue-url]: https://vuejs.org/
[Angular.io]: https://img.shields.io/badge/Angular-DD0031?style=for-the-badge&logo=angular&logoColor=white
[Angular-url]: https://angular.io/
[Svelte.dev]: https://img.shields.io/badge/Svelte-4A4A55?style=for-the-badge&logo=svelte&logoColor=FF3E00
[Svelte-url]: https://svelte.dev/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 