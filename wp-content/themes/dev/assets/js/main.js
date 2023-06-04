if ("serviceWorker" in navigator) {
  navigator.serviceWorker
    .register("/sw.js")
    .then(function (registration) {
      console.log("Service worker registration succeeded:", registration);
    })
    .catch(function (error) {
      console.log("Service worker registration failed:", error);
    });
}

jQuery(document).ready(function () {
  document
    .getElementById("saveFontSettings")
    .addEventListener("click", function () {
      var selectedFontSize = document.getElementById("font-size").value;
      var selectedFontFamily = document.getElementById("font-family").value;
      document.body.style.fontSize = selectedFontSize;
      document.body.style.fontFamily = selectedFontFamily;
      localStorage.setItem("userFontSize", selectedFontSize);
      localStorage.setItem("userFontFamily", selectedFontFamily);
      jQuery("#fontSizeModal").modal("hide");
    });

  window.onload = function () {
    var userFontSize = localStorage.getItem("userFontSize");
    var userFontFamily = localStorage.getItem("userFontFamily");
    if (userFontSize) {
      document.body.style.fontSize = userFontSize;
      document.getElementById("font-size").value = userFontSize;
    }
    if (userFontFamily) {
      document.body.style.fontFamily = userFontFamily;
      document.getElementById("font-family").value = userFontFamily;
    }
  };

  if (!localStorage.getItem("modalClosed")) {
    jQuery("#newsletterModal").modal("show");
  }

  jQuery("#newsletterModal").on("hide.bs.modal", function () {
    localStorage.setItem("modalClosed", true);
  });

  const lightThemeButton = jQuery(".theme-button.light");
  const darkThemeButton = jQuery(".theme-button.dark");

  const savedTheme = localStorage.getItem("theme");
  if (savedTheme) {
    document.documentElement.setAttribute("data-theme", savedTheme);
    if (savedTheme === "dark") {
      darkThemeButton.addClass("active");
    } else {
      lightThemeButton.addClass("active");
    }
    loadStylesheet(savedTheme + ".css");
  } else {
    // Definir e carregar o tema padrão
    document.documentElement.setAttribute("data-theme", "light");
    localStorage.setItem("theme", "light");
    setCookie("theme", "light", 365);
    lightThemeButton.addClass("active");
    loadStylesheet("light.css");
  }

  function loadStylesheet(filename) {
    // Remover a folha de estilo do tema anterior
    var oldLink = document.getElementById("theme-style");
    if (oldLink) {
      document.head.removeChild(oldLink);
    }

    // Carregar a nova folha de estilo
    var link = document.createElement("link");
    link.id = "theme-style";
    link.rel = "stylesheet";
    link.href = php_vars.theme_directory + "/assets/css/" + filename;
    document.head.appendChild(link);
  }

  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }

  lightThemeButton.click(function () {
    document.documentElement.setAttribute("data-theme", "light");
    localStorage.setItem("theme", "light");
    setCookie("theme", "light", 365);
    lightThemeButton.addClass("active");

    darkThemeButton.removeClass("active");
    loadStylesheet("light.min.css");
  });

  darkThemeButton.click(function () {
    document.documentElement.setAttribute("data-theme", "dark");

    localStorage.setItem("theme", "dark");
    setCookie("theme", "dark", 365);

    darkThemeButton.addClass("active");
    lightThemeButton.removeClass("active");
    loadStylesheet("dark.min.css");
  });
});
