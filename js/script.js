
async function jpost(action, params = {}) {
  params.action = action;
  const resp = await fetch("api/api.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: new URLSearchParams(params)
  });
  return await resp.json();
}

$("#formCliente").on("submit", async function (e) {
  e.preventDefault();
  const dados = $(this).serializeArray();
  let obj = {};
  dados.forEach(el => obj[el.name] = el.value);

  const res = await jpost("salvarCliente", obj);
  $("#mensagem").html(res.mensagem);
});
