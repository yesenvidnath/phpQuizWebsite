<?php 
    //including the header file 
    require'header.inc'; 
    //include the database connection file
    require'connect.inc';
?>

        <main>
            <section class="banner">
                <div class="slider">
                    <img src="images/node-js-development.jpg" alt="banner_image" />
                </div>
            </section>
            <div class="banner-button">
                <a href="https://nodejs.org/" class="custom-button">Get Started</a>
            </div>

            <section class="yt-video">
                <div class="container">
                    <div class="home-container">
                        <h1 class="heading" align="center">Exploring Node.js</h1>
                        <div class="home-content">
                            <div class="home-section">
                                <h2 class="home-section-title">What is Node.js?</h2>
                                <br />
                                <p>
                                    Node.js is a server-side platform built on Google Chrome's JavaScript Engine (V8 Engine). It was developed by Ryan Dahl in 2009 and its latest version is v0.10.36. According to its official documentation:
                                </p>
                                <blockquote>
                                    <p>
                                        Node.js is a platform built on Chrome's JavaScript runtime for easily building fast and scalable network applications. Node.js uses an event-driven, non-blocking I/O model that makes it lightweight
                                        and efficient, perfect for data-intensive real-time applications that run across distributed devices.
                                    </p>
                                </blockquote>
                                <p>
                                    Node.js is an open source, cross-platform runtime environment for developing server-side and networking applications. It allows applications to be written in JavaScript and can be run on OS X, Microsoft
                                    Windows, and Linux. It also provides a rich library of JavaScript modules to simplify web application development.
                                </p>
                                <br />
                            </div>
                            <div class="home-section">
                                <h2 class="home-section-title">Features of Node.js</h2>
                                <br />
                                <ul class="features-list">
                                    <li>Asynchronous and Event Driven</li>
                                    <li>Very Fast Execution</li>
                                    <li>Single Threaded but Highly Scalable</li>
                                    <li>No Buffering</li>
                                    <li>Released under the MIT License</li>
                                </ul>
                                <br />
                            </div>
                            <section class="features">
                                <div class="container">
                                    <div class="feature-item-wrapper">
                                        <a href="/" class="feature-item">
                                            <img src="images/ico1.png" alt="" />
                                            <h4>Scalability</h4>
                                        </a>
                                        <a href="/" class="feature-item">
                                            <img src="images/ico2.png" alt="" />
                                            <h4>Performance</h4>
                                        </a>
                                        <a href="/" class="feature-item">
                                            <img src="images/ico3.png" alt="" />
                                            <h4>Big Community</h4>
                                        </a>
                                        <a href="/" class="feature-item">
                                            <img src="images/ico4.png" alt="" />
                                            <h4>Cost-effectiveness</h4>
                                            =
                                        </a>
                                    </div>
                                </div>
                            </section>
                            <div class="home-section">
                                <h2 class="home-section-title">Who Uses Node.js?</h2>
                                <br />
                                <p>Node.js is used by various companies and projects, including eBay, General Electric, GoDaddy, Microsoft, PayPal, Uber, Wikipins, Yahoo!, and Yammer.</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h2><a href="https://youtu.be/HTwiGrrKfDk"><center>VIEW ON YOUTUBE</a></center></h2>
                    <div class="video-wrapper">
                        <embed src="https://www.youtube.com/embed/HTwiGrrKfDk" width="100%" height="500" />
                    </div>
                </div>
            </section>
            <section class="community"></section>
        </main>
            <div class="styled-table">
                <table>
                    <tr>
                        <th colspan="2">PROS and CONS of Node.js</th>
                    </tr>
                    <tr>
                        <td class="pros" ><strong>PROS</strong></td>
                        <td class="cons" ><strong>CONS</strong></td>
                    </tr>
                    <tr>
                        <td>
                            <ul>
                                <li>
                                    <strong>High Performance:</strong> Node.js is built on the V8 JavaScript engine by Google, which compiles JavaScript into machine code for faster execution. This allows Node.js applications to have
                                    excellent performance, making it suitable for handling high-traffic and real-time applications.
                                </li>
                                <li>
                                    <strong>Non-Blocking I/O:</strong> Node.js uses an event-driven, non-blocking I/O model, which means it can handle multiple requests simultaneously without waiting for one to complete before starting
                                    another. This architecture is particularly well-suited for applications with high concurrency and I/O-bound operations.
                                </li>
                                <li>
                                    <strong>Large Package Ecosystem:</strong> Node.js has a vast ecosystem of open-source packages available through npm (Node Package Manager). This extensive library of packages helps developers avoid
                                    reinventing the wheel and speeds up development by providing pre-built solutions for various functionalities.
                                </li>
                                <li>
                                    <strong>Unified Language:</strong> With Node.js, both the server-side and client-side of an application can be written in JavaScript, simplifying the development process and reducing the need for context
                                    switching between different languages.
                                </li>
                                <li>
                                    <strong>Scalability:</strong> Node.js supports horizontal scalability, allowing you to easily distribute the workload across multiple servers or instances. This makes it well-suited for building scalable
                                    applications that can handle increasing amounts of traffic.
                                </li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li>
                                    <strong>Single-Threaded:</strong> While Node.js's single-threaded, event-driven architecture can be an advantage in many scenarios, it can become a limitation for CPU-bound tasks. Heavy computation tasks
                                    can block the event loop, leading to degraded performance for other requests.
                                </li>
                                <li>
                                    <strong>Callback Hell:</strong> Asynchronous programming in Node.js often involves nesting callbacks, leading to complex and hard-to-read code structures known as "callback hell" or the "pyramid of doom."
                                    This can make code maintenance and debugging challenging.
                                </li>
                                <li>
                                    <strong>Lack of Strong Typing:</strong> JavaScript, the underlying language of Node.js, is dynamically typed, which can lead to runtime errors due to type mismatches. This issue can be mitigated using
                                    tools like TypeScript, but it's an additional step in the development process.
                                </li>
                                <li>
                                    <strong>Less Mature for CPU-Intensive Tasks:</strong> Node.js is optimized for I/O-bound tasks and real-time applications. It might not be the best choice for CPU-intensive tasks, where languages like
                                    Python or Java might perform better due to their multi-threading capabilities.
                                </li>
                                <li>
                                    <strong>Limited Support for Multi-Core Systems:</strong> While Node.js can be run in cluster mode to take advantage of multiple cores, it still relies on a single event loop per process. This can lead to
                                    uneven distribution of load among cores and necessitates careful consideration for optimizing performance on multi-core systems.
                                </li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
        <br />

        <div class="text-animation">
            <h2 class="gtitle">
                <span class="title-word title-word-1">SITES</span>
                <span class="title-word title-word-2">BASED</span>
                <span class="title-word title-word-3">ON</span>
                <span class="title-word title-word-4">NODE JS</span>
            </h2>
        </div>

        <div class="gallery">
            <div class="rows">
                <div class="gallery-item">
                    <a href="https://www.Netflix.com/"> <img src="images/Netflix.jpg" alt="Image 1" /></a>
                </div>
                <div class="gallery-item">
                    <a href="https://www.walmart.com/"> <img src="images/Walmart.jpg" alt="Image 2" /></a>
                </div>
                <div class="gallery-item">
                    <a href="https://www.Paypal.com/"> <img src="images/Paypal.jpg" alt="Image 3" /></a>
                </div>
                <div class="gallery-item">
                    <a href="https://www.Nasa.gov/"> <img src="images/Nasa.jpg" alt="Image 4" /></a>
                </div>
            </div>
            <div class="rows">
                <div class="gallery-item">
                    <a href="https://www.linkedin.com/"> <img src="images/Linkedin.jpg" alt="Image 5" /></a>
                </div>
                <div class="gallery-item">
                    <a href="https://www.yahoo.com/"> <img src="images/Yahoo.jpg" alt="Image 6" /></a>
                </div>
                <div class="gallery-item">
                    <a href="https://www.trello.com/"> <img src="images/Trello.jpg" alt="Image 7" /></a>
                </div>
                <div class="gallery-item">
                    <a href="https://www.Medium.com/"> <img src="images/Medium.jpg" alt="Image 8" /></a>
                </div>
            </div>
        </div>

<?php 
    //including the Footer file 
    require'footer.inc'; 
?>