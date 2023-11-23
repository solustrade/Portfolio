namespace ConsultaCNPJ {
  public class CNPJBean {
    public class Address {
      public int? municipality { get; set; }
      public string? street { get; set; }
      public string? number { get; set; }
      public object? details { get; set; }
      public string? district { get; set; }
      public string? city { get; set; }
      public string? state { get; set; }
      public string? zip { get; set; }
      public Country? country { get; set; }
    }

    public class Company {
      public int? id { get; set; }
      public string? name { get; set; }
      public object? equity { get; set; }
      public Nature? nature { get; set; }
      public Size? size { get; set; }
      public List<object>? members { get; set; }
    }

    public class Country {
      public int? id { get; set; }
      public string? name { get; set; }
    }

    public class MainActivity {
      public int? id { get; set; }
      public string? text { get; set; }
    }

    public class Nature {
      public int? id { get; set; }
      public string? text { get; set; }
    }

    public class Root {
      public DateTime? updated { get; set; }
      public string? taxId { get; set; }
      public Company? company { get; set; }
      public object? alias { get; set; }
      public string? founded { get; set; }
      public bool? head { get; set; }
      public string? statusDate { get; set; }
      public Status? status { get; set; }
      public Address? address { get; set; }
      public List<object>? phones { get; set; }
      public List<object>? emails { get; set; }
      public MainActivity? mainActivity { get; set; }
      public List<object>? sideActivities { get; set; }
      public List<object>? registrations { get; set; }
    }

    public class Size {
      public int? id { get; set; }
      public string? acronym { get; set; }
      public string? text { get; set; }
    }

    public class Status {
      public int? id { get; set; }
      public string? text { get; set; }
    }
  }
}
