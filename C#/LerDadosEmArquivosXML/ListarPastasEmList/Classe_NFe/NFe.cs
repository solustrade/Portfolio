// using System.Xml.Serialization;
// XmlSerializer serializer = new XmlSerializer(typeof(NfeProc));
// using (StringReader reader = new StringReader(xml))
// {
//    var test = (NfeProc)serializer.Deserialize(reader);
// }

using System.Collections.Generic;
using System.Xml.Serialization;
using System;

[XmlRoot(ElementName = "ide")]
public class Ide
{

    [XmlElement(ElementName = "cUF")]
    public int CUF { get; set; }

    [XmlElement(ElementName = "cNF")]
    public int CNF { get; set; }

    [XmlElement(ElementName = "natOp")]
    public string NatOp { get; set; }

    [XmlElement(ElementName = "mod")]
    public int Mod { get; set; }

    [XmlElement(ElementName = "serie")]
    public int Serie { get; set; }

    [XmlElement(ElementName = "nNF")]
    public int NNF { get; set; }

    [XmlElement(ElementName = "dhEmi")]
    public DateTime DhEmi { get; set; }

    [XmlElement(ElementName = "dhSaiEnt")]
    public DateTime DhSaiEnt { get; set; }

    [XmlElement(ElementName = "tpNF")]
    public int TpNF { get; set; }

    [XmlElement(ElementName = "idDest")]
    public int IdDest { get; set; }

    [XmlElement(ElementName = "cMunFG")]
    public int CMunFG { get; set; }

    [XmlElement(ElementName = "tpImp")]
    public int TpImp { get; set; }

    [XmlElement(ElementName = "tpEmis")]
    public int TpEmis { get; set; }

    [XmlElement(ElementName = "cDV")]
    public int CDV { get; set; }

    [XmlElement(ElementName = "tpAmb")]
    public int TpAmb { get; set; }

    [XmlElement(ElementName = "finNFe")]
    public int FinNFe { get; set; }

    [XmlElement(ElementName = "indFinal")]
    public int IndFinal { get; set; }

    [XmlElement(ElementName = "indPres")]
    public int IndPres { get; set; }

    [XmlElement(ElementName = "indIntermed")]
    public int IndIntermed { get; set; }

    [XmlElement(ElementName = "procEmi")]
    public int ProcEmi { get; set; }

    [XmlElement(ElementName = "verProc")]
    public double VerProc { get; set; }
}

[XmlRoot(ElementName = "enderEmit")]
public class EnderEmit
{

    [XmlElement(ElementName = "xLgr")]
    public string XLgr { get; set; }

    [XmlElement(ElementName = "nro")]
    public int Nro { get; set; }

    [XmlElement(ElementName = "xBairro")]
    public string XBairro { get; set; }

    [XmlElement(ElementName = "cMun")]
    public int CMun { get; set; }

    [XmlElement(ElementName = "xMun")]
    public string XMun { get; set; }

    [XmlElement(ElementName = "UF")]
    public string UF { get; set; }

    [XmlElement(ElementName = "CEP")]
    public int CEP { get; set; }

    [XmlElement(ElementName = "cPais")]
    public int CPais { get; set; }

    [XmlElement(ElementName = "xPais")]
    public string XPais { get; set; }

    [XmlElement(ElementName = "fone")]
    public double Fone { get; set; }
}

[XmlRoot(ElementName = "emit")]
public class Emit
{

    [XmlElement(ElementName = "CNPJ")]
    public double CNPJ { get; set; }

    [XmlElement(ElementName = "xNome")]
    public string XNome { get; set; }

    [XmlElement(ElementName = "xFant")]
    public string XFant { get; set; }

    [XmlElement(ElementName = "enderEmit")]
    public EnderEmit EnderEmit { get; set; }

    [XmlElement(ElementName = "IE")]
    public double IE { get; set; }

    [XmlElement(ElementName = "CRT")]
    public int CRT { get; set; }
}

[XmlRoot(ElementName = "enderDest")]
public class EnderDest
{

    [XmlElement(ElementName = "xLgr")]
    public string XLgr { get; set; }

    [XmlElement(ElementName = "nro")]
    public int Nro { get; set; }

    [XmlElement(ElementName = "xCpl")]
    public string XCpl { get; set; }

    [XmlElement(ElementName = "xBairro")]
    public string XBairro { get; set; }

    [XmlElement(ElementName = "cMun")]
    public int CMun { get; set; }

    [XmlElement(ElementName = "xMun")]
    public string XMun { get; set; }

    [XmlElement(ElementName = "UF")]
    public string UF { get; set; }

    [XmlElement(ElementName = "CEP")]
    public int CEP { get; set; }

    [XmlElement(ElementName = "cPais")]
    public int CPais { get; set; }

    [XmlElement(ElementName = "xPais")]
    public string XPais { get; set; }

    [XmlElement(ElementName = "fone")]
    public double Fone { get; set; }
}

[XmlRoot(ElementName = "dest")]
public class Dest
{

    [XmlElement(ElementName = "CNPJ")]
    public double CNPJ { get; set; }

    [XmlElement(ElementName = "xNome")]
    public string XNome { get; set; }

    [XmlElement(ElementName = "enderDest")]
    public EnderDest EnderDest { get; set; }

    [XmlElement(ElementName = "indIEDest")]
    public int IndIEDest { get; set; }

    [XmlElement(ElementName = "IE")]
    public double IE { get; set; }

    [XmlElement(ElementName = "email")]
    public string Email { get; set; }
}

[XmlRoot(ElementName = "rastro")]
public class Rastro
{

    [XmlElement(ElementName = "nLote")]
    public double NLote { get; set; }

    [XmlElement(ElementName = "qLote")]
    public double QLote { get; set; }

    [XmlElement(ElementName = "dFab")]
    public DateTime DFab { get; set; }

    [XmlElement(ElementName = "dVal")]
    public DateTime DVal { get; set; }
}

[XmlRoot(ElementName = "prod")]
public class Prod
{

    [XmlElement(ElementName = "cProd")]
    public int CProd { get; set; }

    [XmlElement(ElementName = "cEAN")]
    public string CEAN { get; set; }

    [XmlElement(ElementName = "xProd")]
    public string XProd { get; set; }

    [XmlElement(ElementName = "NCM")]
    public int NCM { get; set; }

    [XmlElement(ElementName = "CEST")]
    public int CEST { get; set; }

    [XmlElement(ElementName = "CFOP")]
    public int CFOP { get; set; }

    [XmlElement(ElementName = "uCom")]
    public string UCom { get; set; }

    [XmlElement(ElementName = "qCom")]
    public double QCom { get; set; }

    [XmlElement(ElementName = "vUnCom")]
    public double VUnCom { get; set; }

    [XmlElement(ElementName = "vProd")]
    public double VProd { get; set; }

    [XmlElement(ElementName = "cEANTrib")]
    public string CEANTrib { get; set; }

    [XmlElement(ElementName = "uTrib")]
    public string UTrib { get; set; }

    [XmlElement(ElementName = "qTrib")]
    public double QTrib { get; set; }

    [XmlElement(ElementName = "vUnTrib")]
    public double VUnTrib { get; set; }

    [XmlElement(ElementName = "vOutro")]
    public double VOutro { get; set; }

    [XmlElement(ElementName = "indTot")]
    public int IndTot { get; set; }

    [XmlElement(ElementName = "rastro")]
    public Rastro Rastro { get; set; }
}

[XmlRoot(ElementName = "ICMS60")]
public class ICMS60
{

    [XmlElement(ElementName = "orig")]
    public int Orig { get; set; }

    [XmlElement(ElementName = "CST")]
    public int CST { get; set; }

    [XmlElement(ElementName = "vBCSTRet")]
    public double VBCSTRet { get; set; }

    [XmlElement(ElementName = "pST")]
    public double PST { get; set; }

    [XmlElement(ElementName = "vICMSSubstituto")]
    public double VICMSSubstituto { get; set; }

    [XmlElement(ElementName = "vICMSSTRet")]
    public double VICMSSTRet { get; set; }
}

[XmlRoot(ElementName = "ICMS")]
public class ICMS
{

    [XmlElement(ElementName = "ICMS60")]
    public ICMS60 ICMS60 { get; set; }

    [XmlElement(ElementName = "ICMS00")]
    public ICMS00 ICMS00 { get; set; }
}

[XmlRoot(ElementName = "IPINT")]
public class IPINT
{

    [XmlElement(ElementName = "CST")]
    public int CST { get; set; }
}

[XmlRoot(ElementName = "IPI")]
public class IPI
{

    [XmlElement(ElementName = "cEnq")]
    public int CEnq { get; set; }

    [XmlElement(ElementName = "IPINT")]
    public IPINT IPINT { get; set; }

    [XmlElement(ElementName = "IPITrib")]
    public IPITrib IPITrib { get; set; }
}

[XmlRoot(ElementName = "PISAliq")]
public class PISAliq
{

    [XmlElement(ElementName = "CST")]
    public int CST { get; set; }

    [XmlElement(ElementName = "vBC")]
    public double VBC { get; set; }

    [XmlElement(ElementName = "pPIS")]
    public double PPIS { get; set; }

    [XmlElement(ElementName = "vPIS")]
    public double VPIS { get; set; }
}

[XmlRoot(ElementName = "PIS")]
public class PIS
{

    [XmlElement(ElementName = "PISAliq")]
    public PISAliq PISAliq { get; set; }

    [XmlElement(ElementName = "PISNT")]
    public PISNT PISNT { get; set; }
}

[XmlRoot(ElementName = "COFINSAliq")]
public class COFINSAliq
{

    [XmlElement(ElementName = "CST")]
    public int CST { get; set; }

    [XmlElement(ElementName = "vBC")]
    public double VBC { get; set; }

    [XmlElement(ElementName = "pCOFINS")]
    public double PCOFINS { get; set; }

    [XmlElement(ElementName = "vCOFINS")]
    public double VCOFINS { get; set; }
}

[XmlRoot(ElementName = "COFINS")]
public class COFINS
{

    [XmlElement(ElementName = "COFINSAliq")]
    public COFINSAliq COFINSAliq { get; set; }

    [XmlElement(ElementName = "COFINSNT")]
    public COFINSNT COFINSNT { get; set; }
}

[XmlRoot(ElementName = "imposto")]
public class Imposto
{

    [XmlElement(ElementName = "ICMS")]
    public ICMS ICMS { get; set; }

    [XmlElement(ElementName = "IPI")]
    public IPI IPI { get; set; }

    [XmlElement(ElementName = "PIS")]
    public PIS PIS { get; set; }

    [XmlElement(ElementName = "COFINS")]
    public COFINS COFINS { get; set; }
}

[XmlRoot(ElementName = "det")]
public class Det
{

    [XmlElement(ElementName = "prod")]
    public Prod Prod { get; set; }

    [XmlElement(ElementName = "imposto")]
    public Imposto Imposto { get; set; }

    [XmlElement(ElementName = "infAdProd")]
    public string InfAdProd { get; set; }

    [XmlAttribute(AttributeName = "nItem")]
    public int NItem { get; set; }

    [XmlText]
    public string Text { get; set; }
}

[XmlRoot(ElementName = "ICMS00")]
public class ICMS00
{

    [XmlElement(ElementName = "orig")]
    public int Orig { get; set; }

    [XmlElement(ElementName = "CST")]
    public int CST { get; set; }

    [XmlElement(ElementName = "modBC")]
    public int ModBC { get; set; }

    [XmlElement(ElementName = "vBC")]
    public double VBC { get; set; }

    [XmlElement(ElementName = "pICMS")]
    public double PICMS { get; set; }

    [XmlElement(ElementName = "vICMS")]
    public DateTime VICMS { get; set; }
}

[XmlRoot(ElementName = "IPITrib")]
public class IPITrib
{

    [XmlElement(ElementName = "CST")]
    public int CST { get; set; }

    [XmlElement(ElementName = "qUnid")]
    public double QUnid { get; set; }

    [XmlElement(ElementName = "vUnid")]
    public double VUnid { get; set; }

    [XmlElement(ElementName = "vIPI")]
    public double VIPI { get; set; }

    [XmlElement(ElementName = "vBC")]
    public double VBC { get; set; }

    [XmlElement(ElementName = "pIPI")]
    public double PIPI { get; set; }
}

[XmlRoot(ElementName = "PISNT")]
public class PISNT
{

    [XmlElement(ElementName = "CST")]
    public int CST { get; set; }
}

[XmlRoot(ElementName = "COFINSNT")]
public class COFINSNT
{

    [XmlElement(ElementName = "CST")]
    public int CST { get; set; }
}

[XmlRoot(ElementName = "ICMSTot")]
public class ICMSTot
{

    [XmlElement(ElementName = "vBC")]
    public double VBC { get; set; }

    [XmlElement(ElementName = "vICMS")]
    public DateTime VICMS { get; set; }

    [XmlElement(ElementName = "vICMSDeson")]
    public double VICMSDeson { get; set; }

    [XmlElement(ElementName = "vFCP")]
    public double VFCP { get; set; }

    [XmlElement(ElementName = "vBCST")]
    public double VBCST { get; set; }

    [XmlElement(ElementName = "vST")]
    public double VST { get; set; }

    [XmlElement(ElementName = "vFCPST")]
    public double VFCPST { get; set; }

    [XmlElement(ElementName = "vFCPSTRet")]
    public double VFCPSTRet { get; set; }

    [XmlElement(ElementName = "vProd")]
    public double VProd { get; set; }

    [XmlElement(ElementName = "vFrete")]
    public double VFrete { get; set; }

    [XmlElement(ElementName = "vSeg")]
    public double VSeg { get; set; }

    [XmlElement(ElementName = "vDesc")]
    public double VDesc { get; set; }

    [XmlElement(ElementName = "vII")]
    public double VII { get; set; }

    [XmlElement(ElementName = "vIPI")]
    public double VIPI { get; set; }

    [XmlElement(ElementName = "vIPIDevol")]
    public double VIPIDevol { get; set; }

    [XmlElement(ElementName = "vPIS")]
    public double VPIS { get; set; }

    [XmlElement(ElementName = "vCOFINS")]
    public double VCOFINS { get; set; }

    [XmlElement(ElementName = "vOutro")]
    public double VOutro { get; set; }

    [XmlElement(ElementName = "vNF")]
    public double VNF { get; set; }
}

[XmlRoot(ElementName = "total")]
public class Total
{

    [XmlElement(ElementName = "ICMSTot")]
    public ICMSTot ICMSTot { get; set; }
}

[XmlRoot(ElementName = "transp")]
public class Transp
{

    [XmlElement(ElementName = "modFrete")]
    public int ModFrete { get; set; }
}

[XmlRoot(ElementName = "detPag")]
public class DetPag
{

    [XmlElement(ElementName = "indPag")]
    public int IndPag { get; set; }

    [XmlElement(ElementName = "tPag")]
    public int TPag { get; set; }

    [XmlElement(ElementName = "vPag")]
    public double VPag { get; set; }

    [XmlElement(ElementName = "xPag")]
    public string XPag { get; set; }
}

[XmlRoot(ElementName = "pag")]
public class Pag
{

    [XmlElement(ElementName = "detPag")]
    public List<DetPag> DetPag { get; set; }
}

[XmlRoot(ElementName = "infAdic")]
public class InfAdic
{

    [XmlElement(ElementName = "infCpl")]
    public string InfCpl { get; set; }
}

[XmlRoot(ElementName = "infNFe")]
public class InfNFe
{

    [XmlElement(ElementName = "ide")]
    public Ide Ide { get; set; }

    [XmlElement(ElementName = "emit")]
    public Emit Emit { get; set; }

    [XmlElement(ElementName = "dest")]
    public Dest Dest { get; set; }

    [XmlElement(ElementName = "det")]
    public List<Det> Det { get; set; }

    [XmlElement(ElementName = "total")]
    public Total Total { get; set; }

    [XmlElement(ElementName = "transp")]
    public Transp Transp { get; set; }

    [XmlElement(ElementName = "pag")]
    public Pag Pag { get; set; }

    [XmlElement(ElementName = "infAdic")]
    public InfAdic InfAdic { get; set; }

    [XmlAttribute(AttributeName = "versao")]
    public double Versao { get; set; }

    [XmlAttribute(AttributeName = "Id")]
    public string Id { get; set; }

    [XmlText]
    public string Text { get; set; }
}

[XmlRoot(ElementName = "CanonicalizationMethod")]
public class CanonicalizationMethod
{

    [XmlAttribute(AttributeName = "Algorithm")]
    public string Algorithm { get; set; }
}

[XmlRoot(ElementName = "SignatureMethod")]
public class SignatureMethod
{

    [XmlAttribute(AttributeName = "Algorithm")]
    public string Algorithm { get; set; }
}

[XmlRoot(ElementName = "Transform")]
public class Transform
{

    [XmlAttribute(AttributeName = "Algorithm")]
    public string Algorithm { get; set; }
}

[XmlRoot(ElementName = "Transforms")]
public class Transforms
{

    [XmlElement(ElementName = "Transform")]
    public List<Transform> Transform { get; set; }
}

[XmlRoot(ElementName = "DigestMethod")]
public class DigestMethod
{

    [XmlAttribute(AttributeName = "Algorithm")]
    public string Algorithm { get; set; }
}

[XmlRoot(ElementName = "Reference")]
public class Reference
{

    [XmlElement(ElementName = "Transforms")]
    public Transforms Transforms { get; set; }

    [XmlElement(ElementName = "DigestMethod")]
    public DigestMethod DigestMethod { get; set; }

    [XmlElement(ElementName = "DigestValue")]
    public string DigestValue { get; set; }

    [XmlAttribute(AttributeName = "URI")]
    public string URI { get; set; }

    [XmlText]
    public string Text { get; set; }
}

[XmlRoot(ElementName = "SignedInfo")]
public class SignedInfo
{

    [XmlElement(ElementName = "CanonicalizationMethod")]
    public CanonicalizationMethod CanonicalizationMethod { get; set; }

    [XmlElement(ElementName = "SignatureMethod")]
    public SignatureMethod SignatureMethod { get; set; }

    [XmlElement(ElementName = "Reference")]
    public Reference Reference { get; set; }
}

[XmlRoot(ElementName = "X509Data")]
public class X509Data
{

    [XmlElement(ElementName = "X509Certificate")]
    public string X509Certificate { get; set; }
}

[XmlRoot(ElementName = "KeyInfo")]
public class KeyInfo
{

    [XmlElement(ElementName = "X509Data")]
    public X509Data X509Data { get; set; }
}

[XmlRoot(ElementName = "Signature")]
public class Signature
{

    [XmlElement(ElementName = "SignedInfo")]
    public SignedInfo SignedInfo { get; set; }

    [XmlElement(ElementName = "SignatureValue")]
    public string SignatureValue { get; set; }

    [XmlElement(ElementName = "KeyInfo")]
    public KeyInfo KeyInfo { get; set; }

    [XmlAttribute(AttributeName = "xmlns")]
    public string Xmlns { get; set; }

    [XmlText]
    public string Text { get; set; }
}

[XmlRoot(ElementName = "NFe")]
public class NFe
{

    [XmlElement(ElementName = "infNFe")]
    public InfNFe InfNFe { get; set; }

    [XmlElement(ElementName = "Signature")]
    public Signature Signature { get; set; }

    [XmlAttribute(AttributeName = "xmlns")]
    public string Xmlns { get; set; }

    [XmlText]
    public string Text { get; set; }
}

[XmlRoot(ElementName = "infProt")]
public class InfProt
{

    [XmlElement(ElementName = "tpAmb")]
    public int TpAmb { get; set; }

    [XmlElement(ElementName = "verAplic")]
    public string VerAplic { get; set; }

    [XmlElement(ElementName = "chNFe")]
    public double ChNFe { get; set; }

    [XmlElement(ElementName = "dhRecbto")]
    public DateTime DhRecbto { get; set; }

    [XmlElement(ElementName = "nProt")]
    public double NProt { get; set; }

    [XmlElement(ElementName = "digVal")]
    public string DigVal { get; set; }

    [XmlElement(ElementName = "cStat")]
    public int CStat { get; set; }

    [XmlElement(ElementName = "xMotivo")]
    public string XMotivo { get; set; }
}

[XmlRoot(ElementName = "protNFe")]
public class ProtNFe
{

    [XmlElement(ElementName = "infProt")]
    public InfProt InfProt { get; set; }

    [XmlAttribute(AttributeName = "versao")]
    public double Versao { get; set; }

    [XmlText]
    public string Text { get; set; }
}

[XmlRoot(ElementName = "nfeProc")]
public class NfeProc
{

    [XmlElement(ElementName = "NFe")]
    public NFe NFe { get; set; }

    [XmlElement(ElementName = "protNFe")]
    public ProtNFe ProtNFe { get; set; }

    [XmlAttribute(AttributeName = "xmlns")]
    public string Xmlns { get; set; }

    [XmlAttribute(AttributeName = "versao")]
    public double Versao { get; set; }

    [XmlText]
    public string Text { get; set; }
}

