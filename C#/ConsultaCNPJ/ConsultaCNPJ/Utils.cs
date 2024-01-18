using Newtonsoft.Json.Linq;
using RestSharp;

namespace ConsultaCNPJ
{
  public static class Utils
  {
    public static JObject ConsultaCNPJ()
    {
      Thread.CurrentThread.SetApartmentState(ApartmentState.STA);
      RestClient client = new RestClient(new RestClientOptions("https://api.cnpja.com")
      {
        MaxTimeout = -1
      });
      RestRequest request = new RestRequest("/office/64397557000190?registrations=MG&maxAge=30");
      request.AddHeader("Authorization", "");
      return JObject.Parse(client.Execute(request).Content);
    }
  }
}
