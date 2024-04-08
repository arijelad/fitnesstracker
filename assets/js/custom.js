$(document).ready(function () {
  console.log("Document is ready");

  $(window).on("hashchange", function () {
    console.log("Hash changed to: ", window.location.hash);
  });

  var app = $.spapp({
    defaultView: "home",
    templateDir: "tpl/",
    pageNotFound: "error_404",
  }); // initialize

  // define routes
  app.route({
    view: "home",
    load: "index.html",
    onCreate: function () {
      console.log("Creating home");
    },
    onReady: function () {
      console.log("Home is ready");
    },
  });
  app.route({
    view: "trainers",
    load: "trainers.html",
    onCreate: function () {
      console.log("Creating trainers");
    },
    onReady: function () {
      console.log("Trainers is ready");
    },
  });
  app.route({
    view: "programs",
    load: "programs.html",
    onCreate: function () {
      console.log("Creating programs");
    },
    onReady: function () {
      console.log("Programs is ready");
    },
  });
  app.route({
    view: "login",
    load: "login.html",
    onCreate: function () {
      console.log("Creating login");
    },
    onReady: function () {
      console.log("Login is ready");
    },
  });
  app.route({
    view: "register",
    load: "register.html",
    onCreate: function () {
      console.log("Creating registration");
    },
    onReady: function () {
      console.log("Registration is ready");
    },
  });
  app.route({
    view: "contact",
    load: "contact.html",
    onCreate: function () {
      console.log("Creating contact");
    },
    onReady: function () {
      console.log("Contact is ready");
    },
  });

  // run app
  app.run();
  console.log($.spapp); // Trebalo bi da ispiše funkciju ili objekt
});
