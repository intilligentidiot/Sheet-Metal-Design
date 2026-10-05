Article 10: Design Decisions That Reduce Manufacturing Cost
# Article 10: Design Decisions That Reduce Manufacturing Cost

**Status:** DRAFT. Requires engineer review before publication.
**Campaign:** Campaign 1, Mechanical Engineering Insights Series (Machine Design category)
**Target keywords (campaign plan):** design for manufacturing, DFM services
**Primary link:** https://www.teslamechanicaldesigns.com/fabrication-design-services.php, anchor "designing for the cutting table and press brake"
**Secondary link:** https://www.teslamechanicaldesigns.com/sheet-metal-design-services.php, anchor "a sheet metal DFM review" (proposed, see link notes)

## 1. Title
-------------

Design Decisions That Reduce Manufacturing Cost

## 2. Meta description
------------------------

Most fabrication costs are fixed on the drawing before a quote is requested. Nesting, bend radii, tolerances, and weld sizes determine it. Here is how.

**AI GPT\***

20.4%

# Design Decisions That Reduce Manufacturing Cost

When a fabrication quote comes back high, the usual response is to push the fabricator on price. Sometimes that works. More often the shop has very little to give, because most of the cost was fixed by the drawing they were sent. Design for manufacturing is about catching those costs while they are still dimensions and notes in CAD, which is the only point where changing them is cheap.

We check a lot of fabrication and sheet metal drawings before release. The expensive ones rarely have one big mistake. They have a handful of small decisions nobody costed: a blank slightly too big for a good nest, a bend radius the brake can't produce, ISO 2768 fine called up across the whole sheet, a fillet weld sized up "to be safe". Below is how each of those turns into money, with the arithmetic where there is some.

## The flat blank is priced on the cutting table

The shop buys sheet, not parts. Everything between your blanks goes in the skeleton bin and is still on the invoice. So what matters on a laser-cut part is how many blanks nest on the sheet size the shop holds in the rack.

Here is a simple case. A 2500 × 1250 mm sheet, 10 mm clear around the edge, 10 mm between parts, a single rectangular blank nested in whichever orientation fits more. Then the same blank with one side 5 mm longer, which is the sort of change that happens when someone lengthens a flange to look better or rounds a clearance up.

| Flat blank (mm) | Best layout | Blanks per sheet | Sheet area used as part |
|---|---|---|---|
| 400 × 300 | 6 × 4 | 24 | 92.2 % |
| 400 × 305 | 7 × 3 | 21 | 82.0 % |

The extra 5 mm loses three blanks per sheet, so the material cost of each part goes up by about a seventh (24 ÷ 21 = 1.143). The part works exactly as it did before.

You can check this on a calculator: usable length plus one gap, divided by blank length plus one gap, rounded down, and the same across the width. In practice, the programmer will mix parts on the sheet, and NestingWorks or the machine's own nesting will beat a single-part grid. The point is that flat sizes often sit just either side of a step like this one, and a designer who knows the stock sheet size can usually keep the part on the cheap side. Ask the shop what they stock before you fix the flange lengths.

## Let the press brake set the bend radius

Most general fab shops air bend. With air bending, the inside radius comes from the punch and the V-die opening. Whatever radius is on the drawing, the part comes out with the radius that tooling makes. If the drawing asks for a radius the shop has no tooling for, they either buy tooling and put it in the price, bend it on what they have and send you a part whose flat pattern no longer matches, or ring you up and park the job until you answer.

None of that is necessary. Get the shop's tooling list, model the radius they will actually produce, and build the flat pattern on it. Take the K-factor from the shop's own test bends in that material and thickness rather than the CAD default. The DXF is only as accurate as the K-factor behind it, and springback varies enough between materials that a default will catch you out.

Then look at the part the way the brake operator will:

- **Short flanges.** A flange that can't bridge the V-die opening can't be air bent on that die. A narrower die changes the radius, so the short flange quietly changes the flat pattern as well.
    
- **Bend order.** Every bend has to be possible after the ones before it. A return flange that hits the punch or the beam on the last hit is either found in CAD or found on the shop floor with a gooseneck punch, if the shop has one.
    
- **Holes close to bends.** They pull oval as the material stretches. Move them off the bend line or cut a relief and accept the slot.
    

That is what [designing for the cutting table and press brake](https://www.teslamechanicaldesigns.com/fabrication-design-services.php) looks like day to day: the flat pattern, the tooling, and the bend sequence agree before the DXF goes out. For enclosures and bracket families that will run in batches, [a sheet metal DFM review](https://www.teslamechanicaldesigns.com/sheet-metal-design-services.php) covering bend radius, K-factor, reliefs, and PEM hardware placement usually pays for itself on the first run

## Tolerance: what the process can hold

Any dimension without its own tolerance takes the general tolerance in the title block. ISO 2768-1 sets those by class. An extract for linear dimensions:

| Nominal size range (mm) | Fine (f) | Medium (m) | Coarse (c) |
|---|---|---|---|
| over 30 up to 120 | ± 0.15 | ± 0.3 | ± 0.8 |
| over 120 up to 400 | ± 0.2 | ± 0.5 | ± 1.2 |
| over 400 up to 1000 | ± 0.3 | ± 0.8 | ± 2.0 |

*Source: ISO 2768-1:1989, Table 1. Values in mm.*

Writing "ISO 2768-f" in the title block because it looks rigorous means every flange height, hole-to-edge distance, and overall length on the sheet has to hold the fine column. Dimensions taken across a bend pick up the variation of every bend in between, and the shop has to measure and prove all of it.

It is cheaper to pick the general class for the process and put tight tolerances only where the function needs them, such as the hole pattern for a bought-in component or the face a bearing locates on. Dimension those from the datum they actually work from, and where you can, keep them on one flat face so the laser holds them, rather than across a bend where it depends on the brake.

Welded frames have their own general tolerance standard, ISO 13920, because a welded structure moves in ways a machined part does not. Machining tolerances on an as-welded frame either buy you a post-weld machining operation or an NCR.

## Weld size is paid for in square millimetres

Treat a fillet weld as a right-angled triangle with both sides equal to the leg length. Its area is the leg squared over two, and filler metal, arc time, and heat input all go up with that area.

| Fillet leg length *z* (mm) | Throat thickness *a* = 0.707 *z* (mm) | Nominal cross-section *z*² ÷ 2 (mm²) |
|---|---|---|
| 6 | 4.2 | 18 |
| 8 | 5.7 | 32 |

Going from a 6 mm to an 8 mm leg gives a third more throat, which is what carries the load, and 78 % more weld metal in every metre of joint. Strength goes up in proportion to the leg; cost goes up with its square.

So size welds from the load the joint actually carries, and put them on the drawing with ISO 2553 symbols so the welder isn't left guessing. An "8 mm all round" note on a lightly loaded bracket is a cost decision even if nobody meant it as one.

Access costs money too. If the welder can't see the joint or can't get the torch in at a sensible angle, the weld is slow and hard to inspect. Check access in the model at the stage the frame is actually welded, with only the members that are tacked in by then, not on the finished assembly.

## Fewer parts, fewer setups

Every separate part gets cut, deburred, handled, put in a jig, and joined. A bracket welded to a panel is two parts, a fixture and a weld. Formed as a flange on the panel, it is one part with one extra bend. It won't always work, but it is worth asking every time.

Tabs and slots do a similar job for the parts that do have to be separate. Cut into the blanks; they locate the parts against each other so the laser does the setting out, and they make the assembly hard to put together wrong.

Material belongs here as well. Specify thicknesses and grades the supplier keeps in stock. An odd gauge comes with a minimum order and a lead time, and both turn up in the quote.

## Send the drawing to the shop before you release it

All of these are cheap to change before release and expensive after. Before a drawing goes out for quotation, ask the fabricator who will make it what sheet sizes they stock, what tooling is on their brake, and what tolerances they hold without a second operation. Then draw to the answers.

A design that can be cut and formed on the shop's own kit, welded where the welder can reach, and toleranced for the process will rarely be the high quote. One that can't will stay expensive however hard purchasing pushes.

## 4. Link placements

| # | Anchor text | Target URL | Placement in context |
|---|---|---|---|
| 1 (primary) | designing for the cutting table and press brake | https://www.teslamechanicaldesigns.com/fabrication-design-services.php | "None of this is exotic. It is what **designing for the cutting table and press brake** means in practice: the flat pattern, the tooling and the bend sequence agree with each other before the DXF leaves the building." |
| 2 (secondary) | a sheet metal DFM review | https://www.teslamechanicaldesigns.com/sheet-metal-design-services.php | "Where the part is an enclosure or a bracket family rather than a one-off, **a sheet metal DFM review** of bend radius, K-factor, reliefs and hardware placement is usually the cheapest hour in the programme." |

Link notes:
- Both links are dofollow, neither is in the opening paragraph, and they sit in the press brake section where the reader is most likely to want detail.
- The link map assigns no anchor to the secondary target for this article. "a sheet metal DFM review" is proposed because it does not duplicate any anchor in the link map (article 17 uses "sheet metal design services" and article 16 uses "flat patterns and DXF files"). Please add it to the link map if approved.
- The two links sit in adjacent paragraphs. If that reads as stacked, the secondary link can move to the tolerance section or be dropped.

## 5. Here's where each images goes in the article body:

- **10-nesting.png goes** in the section "The flat blank is priced on the cutting table". Put it straight after the table with 24 and 21 blanks, before the paragraph that starts "Five millimetres on one dimension costs three parts per sheet."
- **10-press-brake.png** goes in the section "Let the press brake set the bend radius". Put it straight after that heading, before the paragraph that starts "Most press brake work in a general fabrication shop is air bending."
- **10-fillet-weld.png** goes in the section "Weld size is paid for in square millimetres". Put it straight after the table with the 6 mm and 8 mm rows, before the paragraph that starts "Moving from a 6 mm to an 8 mm leg."s