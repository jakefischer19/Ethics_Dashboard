const startPDf = () => {
  let doc = new docx.Document();

  doc.addSection({
    children: [
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text:
              "ETHICAL ISSUE & OPTIONS   Score:" +
              document.getElementById("text-1").value,
          }),
        ],
      }), //Ethical Issue & Option
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text:
              "Comment Summary:   " +
              document.getElementById("progress-1").value,
          }),
        ],
      }), //Ethical Issue & Option
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text:
              "DEOONTOLOGY   Score:" + document.getElementById("text-2").value,
          }),
        ],
      }), //Deontology
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text:
              "Comment Summary:   " +
              document.getElementById("progress-2").value,
          }),
        ],
      }), //Deontology
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text:
              "STAKEHOLDER   Score:" + document.getElementById("text-3").value,
          }),
        ],
      }), //StakeHolders
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text:
              "Comment Summary:   " +
              document.getElementById("progress-3").value,
          }),
        ],
      }), //StakeHolders
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text:
              "UTILTARIANISM   Score:" +
              document.getElementById("text-4").value,
          }),
        ],
      }), //Utiltarianism
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text:
              "Comment Summary:   " +
              document.getElementById("progress-4").value,
          }),
        ],
      }), //Utiltarianism
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text:
              "VIRTUE ETHICS   Score:" +
              document.getElementById("text-5").value,
          }),
        ],
      }), //Virtue Ethics
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text:
              "Comment Summary:   " +
              document.getElementById("progress-5").value,
          }),
        ],
      }), //Virtue Ethics
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text:
              "CARE ETHICS   Score:" + document.getElementById("text-6").value,
          }),
        ],
      }), //Care Ethics
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text:
              "Comment Summary:   " +
              document.getElementById("progress-6").value,
          }),
        ],
      }), //Care Ethics
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
      new docx.Paragraph({
        children: [
          new docx.TextRun({
            text: "",
          }),
        ],
      }), //Spacing
    ],
  });

  docx.Packer.toBlob(doc).then((blob) => {
    saveAs(blob, "Case report.docx");
  });
};
document.querySelector("#generateBtn").addEventListener("click", () => {
  startPDf();
});
