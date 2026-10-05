**The Tolerance Callout That Turns a $200 Bracket Into a $2,000 Rework**
========================================================================

The drawing looked fine. A hole location requirement equivalent to a 0.005" positional accuracy requirement on the mounting holes, a standard title block, nothing that jumped out in review. The bracket itself was a simple weldment: three plates, four fillet welds, four tapped holes.

Then the first production batch came back from inspection with a 60% reject rate. Not because the welder did anything wrong. Because a weldment that’s just been through a welding thermal cycle doesn’t hold tight positional requirements without a secondary machining operation nobody budgeted for.

That’s the failure mode worth naming directly: the tolerance was tighter than the process that was actually going to produce the part. On a drawing, that’s a design decision, not a shop-floor mistake.

**Where the Mismatch Actually Comes From**
------------------------------------------

Most of the time it isn’t one bad number. It’s a mismatch between what the callout says and what state the part is actually in when that feature gets measured. Three patterns account for most of it.

No distinction between as-welded and finish-machined. If the mounting holes get drilled or reamed after welding, in a fixture, a tight position tolerance can be completely reasonable; that’s a machined feature at that point, held to a rigid datum. If those same holes were created before welding, and the drawing applies that tolerance to the finished assembly, the requirement is now fighting heat distortion from every weld in the sequence. A tight location requirement on an as-welded feature can be significantly tighter than what many welding processes can achieve without secondary machining or controlled fixturing.

Datums called out on features that move during welding. A thin-gauge tab or a cantilevered flange that isn’t held in a weld fixture can shift enough during cooling to exceed a tolerance that would be trivial on a rigid, fixtured datum. Getting the datum scheme right on a weldment is its own discipline. Our guide on choosing datums for weldment drawings goes through how to pick reference features that actually hold still.

The tolerance got copied from a machined-part template. It’s common for a drawing to inherit a default title-block tolerance, or a GD&T scheme, from a similar part that was never a weldment in the first place. Nobody re-evaluates whether the number still makes sense once the process changes from “machine the whole thing” to “weld it, then machine one feature.”

None of these are exotic. They tend to be obvious in a design review with someone from the shop in the room, and easy to miss in a review that’s purely engineering-to-engineering.

**Why the Cost Jumps the Way It Does**
--------------------------------------

A weldment that’s within spec as-welded is a $200 part: material, weld time, maybe a deburr pass. Once the shop can’t hit the callout as drawn, there are really only a few ways forward, and none of them are cheap:

*   Add a secondary CNC operation to re-establish hole positions after welding: new fixture, new setup, new inspection step, on every unit going forward.
    
*   Straighten or re-fixture the weldment before final machining to pull it back into tolerance, which adds labor and risks introducing its own residual stress.
    
*   Scrap and re-run the batch, eating the reject rate plus the schedule hit.
    

In some production environments, these added operations can increase the effective part cost by an order of magnitude once fixtures, setups, machining, inspection, and delays are included. The problem is not that the part is difficult to make; it is that the drawing specified a tolerance the as-welded process was never going to deliver on its own.

This is the same category of problem we’ve covered before in why sheet metal parts fail at the bend: a manufacturing constraint that was never checked against the drawing until the parts came back.

**The Standard That Actually Governs This**
-------------------------------------------

This isn’t a judgment call made on the shop floor. ISO 13920 welding general tolerances exist specifically to address welded construction accuracy. It defines general tolerances for linear and angular dimensions, and for shape and position, on welded structures, organized into tolerance classes based on realistic workshop accuracy rather than machined-part precision.

If ISO 13920 is referenced on a drawing, its tolerance classes provide a defined expectation for general welded construction accuracy. The tolerance class should be selected based on the actual functional requirement of the feature, not applied as a blanket default.

The practical implication: if a drawing does not define appropriate general tolerances or specific functional requirements, ambiguity can exist between design intent and manufacturing capability.

If your organization uses ASME Y14.5 standard governing GD&T principles, including feature control frames and datum reference frames, the same principle applies from that side: a position tolerance is supposed to reflect a functional requirement, not get inherited from wherever the drawing template came from. Neither standard assumes a weldment behaves like a solid, rigid, machined blank, and a tolerance scheme that quietly makes that assumption is working against the intent of proper design documentation.

**The Actual Fix**
------------------

Tie every tight tolerance to a real functional requirement: a mating fit, an alignment feature, a load path, and let everything else run on a general tolerance class appropriate for welded construction. If a feature genuinely needs to be tight after welding, say so explicitly: call it out as a post-weld machined feature, with its own datum scheme referencing a fixture or a machined surface, instead of assuming the same requirement applies to the raw weldment.

When a tolerance shows up that looks like it was copied from somewhere else, it’s worth a five-minute gut check before the drawing goes out: does this part’s actual process welded then machined, or machined only support this number, or is the number just along for the ride from an earlier revision?

In this kind of case, the reject rate isn’t a fabrication problem. It’s the drawing asking the process to do something it was never capable of doing, and nobody catching it until the parts came back from inspection.

If tolerance-driven reject rates on your weldments don’t line up with what the shop should reasonably be able to hold, it’s worth a second look at the drawing before the process.